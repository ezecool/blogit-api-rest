<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Hogar'
        ]);

        Categoria::create([
            'nombre' => 'Economia'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Deportes'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Tecnologia'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Politica'
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Espectaculos'
        ]);

    }
}
