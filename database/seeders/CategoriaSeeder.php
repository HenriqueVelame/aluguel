<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $this->call(CategoriaSeeder::class);
       \App\Models\Category::create(['nome_categoria' => 'Anime']);
       \App\Models\Category::create(['nome_categoria' => 'Games']);
       \App\Models\Category::create(['nome_categoria' => 'Filmes']);
    }
}
