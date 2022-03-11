<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryPost;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories = [
            ['id' => '1', 'name' => 'Angular'],
            ['id' => '2', 'name' => 'React Native'],
            ['id' => '3', 'name' => 'Vue'],
            ['id' => '4', 'name' => 'Javascript'],
            ['id' => '5', 'name' => 'React'],
            ['id' => '6', 'name' => 'Firebase'],
            ['id' => '7', 'name' => 'MongoDB'],
            ['id' => '8', 'name' => 'NodeJS'],
            ['id' => '9', 'name' => 'Python'],
            ['id' => '10', 'name' => 'Php'],
            ['id' =>  '11', 'name' => 'MySQL'],
        ];

        foreach ($categories as $id) {
            Category::create($id);
        } 

/*         $faker = Faker::create();

        $q = 1;
        while ($q <= 59) {
            Category::create([
                'id' => $q,
                'name' => $faker->name,
            ]);
            $q++;
        } */

        $i = 0;
        while ($i <= 30) {
            CategoryPost::create([
                'posts_id' => Post::get()->pluck('id')->random(),
                'categories_id' => Category::get()->pluck('id')->random(),
            ]);
            $i++;
        }
    }
}
