<?php

namespace Database\Seeders;

use App\Models\Social;
use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            ['id' => '1','name' => 'Facebook'],
            ['id' => '2','name' => 'Instagram'],   
            ['id' => '3','name' => 'Twitter'], 
            ['id' => '4','name' => 'GitHub'], 
            ['id' => '5','name' => 'Dribble'], 
        ];

        foreach($socials as $social) {
            Social::create($social);
            }   
    
    }
}
