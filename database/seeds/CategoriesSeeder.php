<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'name' => 'Economia'
        ]);

        DB::table('categories')->insert([
            'name' => 'Deportes'
        ]);

        DB::table('categories')->insert([
            'name' => 'Tecnologia'
        ]);
    }
}
