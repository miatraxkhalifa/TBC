<?php

namespace Database\Seeders;

use App\Models\Body;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //   $post = Post::get()->pluck('id')->random();
     $faker = Faker::create();
     $post = Post::get()->pluck('id');
     foreach($post as $key => $value) {
        Body::create([
            'post_id' => $value,
            'body' => $faker->sentence($nbWords = 120, $variableNbWords = true),
          //  'image' => $faker->url,
         //   'image_alt' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        ]);
    }
     $i = 0;
     while ($i <= 60) {


         Body::create([
             'post_id' => Post::get()->pluck('id')->random(),
             'body' => $faker->sentence($nbWords = 120, $variableNbWords = true),
            // 'image' => $faker->imageUrl(640, 360, 'animals', true, 'dogs', true),
           //  'image_alt' => $faker->sentence($nbWords = 1, $variableNbWords = true),
         ]);
     $i++;   
     }
    }
}
