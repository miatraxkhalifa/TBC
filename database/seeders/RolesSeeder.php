<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['id' => '1','title' => 'Admin'],
            ['id' => '2','title' => 'User'],       
        ];

        foreach($roles as $role) {
            Role::create($role);
            }   
    }
}
