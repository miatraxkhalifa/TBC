<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\CommentPost;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        $i = 0;
        while ($i <= 55) {
            Comment::create([
                'body' => $faker->sentence($nbWords = 120, $variableNbWords = true),
                'name' => $faker->name,
                'email' => $faker->email,
            ]);
        $i++;   
        }

        $q = 0;
        while ($q <= 50) {
            CommentPost::create([
                'posts_id' => Post::get()->pluck('id')->random(),
                'comments_id' => Comment::get()->pluck('id')->random(),
            ]);
        $q++;
        }
    }
}
