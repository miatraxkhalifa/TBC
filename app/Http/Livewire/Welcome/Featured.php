<?php

namespace App\Http\Livewire\Welcome;

use App\Models\Post;
use Livewire\Component;

class Featured extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    
    public function render()
    {
        $post = Post::where('status', 1)->with('Category','User','Body')->orderBy('likes', 'DESC')->first();
        return view('livewire.welcome.featured', [
            'post' => $post,
        ]);
    }
}
