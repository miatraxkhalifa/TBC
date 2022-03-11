<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $i = 0;

        while ($i <= 20) {

            $namelsug = $faker->sentence($nbWords = 3, $variableNbWords = true);
            Post::create([
                'name' => $namelsug,
                'slug' => $this->createSlug($namelsug),
                'views' => $faker->randomNumber(2),
                'likes' => $faker->randomNumber(1),
                'users_id' =>  User::get()->pluck('id')->random(),
                'status' => rand(0,1),
                'created_at' => $faker->dateTimeBetween('-31 days', '+2 months'),
            ]);

            $i++;
        }
    }

    public static function createSlug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    } 
}
