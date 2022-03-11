<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class Contributors extends Component
{
    public function render()
    {
        $users= User::withCount('Post')->whereHas('Post', function ($q){
            $q->where('status',1);
        })->orderby('post_count', 'DESC')->take(9)->get();

        return view('livewire.contributors', [
            'users' => $users,
        ])->layout('layouts.post');
    }
}
