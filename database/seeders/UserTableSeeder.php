<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(env('ADMIN_PASSWORD', 'test'))
        ]);
    }
}
