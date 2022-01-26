<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AttachmentTableSeeder::class,
            UserTableSeeder::class,
            RoleTableSeeder::class,
            CategoryTableSeeder::class,
            PostTableSeeder::class,
            CommentTableSeeder::class,
            TagTableSeeder::class,
            ProjectTableSeeder::class,
        ]);
    }
}
