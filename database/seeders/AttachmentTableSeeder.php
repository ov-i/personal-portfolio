<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attachments')->insert([
           'name' => 'matebook.png',
           'source' => 'http://localhost:8000/attachments/matebook.png',
           'mimetype' => 'image/png',
           'filesize' => 386000,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now()
        ]);
    }
}
