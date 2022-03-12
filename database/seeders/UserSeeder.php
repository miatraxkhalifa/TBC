<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user = User::create([
            'name' => 'Wendell Segundo',
            'email' => 'miatraxkhalifa@gmail.com',
            'password' => Hash::make('Romans123!'),
       ]);

       $user->RoleUser()->create(['roles_id' => '1'])->save();

/*        $faker = Faker::create();
       $i = 0;
       while ($i <= 20) {
           User::create([
               'name' => $faker->name,
               'email' => $faker->email,
               'password' => Hash::make('Romans123!'),
           ])->RoleUser()->create(['roles_id' => '2'])->save();
       $i++;   
       } */
    }
}
