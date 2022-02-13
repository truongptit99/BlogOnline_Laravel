<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'role_admin'],
            ['name' => 'role_user'],
        ]);

        DB::table('users')->insert([
            'fullname' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make(12345678),
            'is_active' => config('app.is_active'),
            'email' => 'admin@gmail.com',
            'address' => 'Ha Noi',
            'role_id' => config('app.role_admin'),
        ]);
    }
}
