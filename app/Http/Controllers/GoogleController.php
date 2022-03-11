<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function google()
    {
        //send user's request
        return Socialite::driver('google')->redirect();
     //   return Socialite::driver
    }

    public function googleRedirect()
    {
        //get oauth request back GitHub 
        $user = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'email' => $user->email
        ],
        [
            'name' => $user->name,
            'password' => Hash::make(Str::random(12))
        ]);

        $user->RoleUser()->firstorcreate(
            ['roles_id' => '2', 'users_id' => $user->id],
            [],
            )->save();

        Auth::login($user, true);

        return redirect ('/dashboard');
        
    }
}
