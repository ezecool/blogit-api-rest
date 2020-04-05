<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan Perez',
            'username' => 'jperez',
            'email' => 'jperez@email.com',
            'password' => Hash::make('jperez'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'name' => 'Pablo Chacon',
            'username' => 'pchacon',
            'email' => 'pchacon@email.com',
            'password' => Hash::make('pchacon'),
            'api_token' => Str::random(60)
        ]);

        DB::table('users')->insert([
            'name' => 'Lucia Mercado',
            'username' => 'lucham',
            'email' => 'lucham@email.com',
            'password' => Hash::make('lucham'),
            'api_token' => Str::random(60)
        ]);
    }
}
