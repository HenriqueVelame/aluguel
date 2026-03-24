<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; // Importado para gerar o token aleatório
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    // 1. Mostra a tela de pedir o e-mail (Bootstrap)
    public function showLinkRequestForm() {
        return view('auth.forgot-password');
    }

    // 2. Gera o código, salva no banco e dispara o e-mail real
    public function sendResetCode(Request $request) {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $code = random_int(100000, 999999);

        // Salva ou atualiza o código no banco (preenchendo o 'token' obrigatório)
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'code' => $code,
                'token' => Str::random(60), 
                'expires_at' => Carbon::now()->addMinutes(10),
                'created_at' => Carbon::now()
            ]
        );

        // Envio via SMTP (Configurado no seu .env)
        Mail::raw("Seu código de recuperação de senha do CosplaySys é: {$code}", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Código de Recuperação de Senha');
        });

        \Log::info("E-mail enviado para {$request->email} com o código: {$code}");

        return redirect()->route('password.reset', ['email' => $request->email])
                         ->with('status', 'O código foi enviado para o seu e-mail!');
    }

    // 3. Mostra a tela de digitar o código (Bootstrap)
    public function showResetForm($email) {
        return view('auth.reset-password', ['email' => $email]);
    }

    // 4. Valida código, expiração e troca a senha
    public function reset(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string',
            'password' => 'required|confirmed|min:8',
        ]);

        $reset = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        // Validação do código
        if (!$reset || (string)$reset->code !== (string)$request->code) {
            return back()->withErrors(['code' => 'Código inválido.']);
        }

        // Validação de tempo (10 min)
        if (Carbon::parse($reset->expires_at)->isPast()) {
            return back()->withErrors(['code' => 'Código expirado. Peça um novo.']);
        }

        // Sucesso: Atualiza o usuário e limpa o token usado
        DB::table('users')->where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Senha alterada com sucesso! Faça login.');
    }
}