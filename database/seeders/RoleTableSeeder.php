<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Użytkownik',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        for ($i = 1; $i <= 10; $i++) {
            $user = User::find($i);
            $user->roles()->attach(2);
        }
        for ($i = 10; $i <= 18; $i++) {
            $user = User::find($i);
            $user->roles()->attach(1);
        }
        for ($i = 18; $i <= 20; $i++) {
            $user = User::find($i);
            $user->roles()->sync([1, 2]);
        }
    }
}
