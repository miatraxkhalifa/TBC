<?php

namespace App\Http\Livewire\Welcome;
use App\Models\Post;
use Livewire\Component;

class Top extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    
    public function render()
    {
        $posts = Post::where('status',1)->with('Category','User','Body')->orderBy('created_at', 'DESC')->take(6)->get();
        return view('livewire.welcome.top', [
            'posts' => $posts,
        ]);
    }
}
