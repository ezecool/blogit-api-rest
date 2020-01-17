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
    }
}
