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
        // User::factory(10)->create();
        $this->call([
            RolesSeeder::class,
            UserSeeder::class,
         //   PostSeeder::class,
         //   BodySeeder::class,
            CategorySeeder::class,
        //    CommentSeeder::class,
            SocialSeeder::class,
        ]);
    }
}
