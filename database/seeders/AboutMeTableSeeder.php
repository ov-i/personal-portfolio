<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutMeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_me')->insert([
            'about_work' => 'Na co dzień tworzę, oraz rozwijam nowe projekty z wykorzystaniem nowoczesnych technologii.
                            Jestem również pracownikiem w przedsiębiorstwie Encode IT Rafał Jaseniuk na stanowisku Full Stack Web Developera.',
            'about_interest' => 'Poza pracą jako programista, interesuję się elektroniką w odniesieniu do budowy robotów z
             wykorzystaniem Arduino UNO, zabawą z RasberryPi i tym podobnych.',
            'email' => 'b.pazdur@yahoo.com',
            'cv_url' => 'cv/cv.pdf',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
