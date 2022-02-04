<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            'name' => 'Lat doświadczenia',
            'value' => '6'
        ]);

        DB::table('testimonials')->insert([
            'name' => 'Zadowolonych klientów',
            'value' => '30'
        ]);

        DB::table('testimonials')->insert([
            'name' => 'Ukończonych projetków',
            'value' => '100+'
        ]);
    }
}
