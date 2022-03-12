<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Show extends Component
{
    use AuthorizesRequests;
    public Post $post;

    public function mount(Post $post)
    {
        $this->authorize('published', $this->post);
        $this->post = $post;
        $this->post->views++;
        $this->post->save();
       
    }
    
    public function render()
    {
        $show = $this->post->with('user','body','comment', 'category')->get();
        return view('livewire.blog.show', [
            'show' => $show,
        ])
        ->layout('layouts.post');
    }

    public function like()
    {
        $this->post->likes++;
        $this->post->save();
        $this->dispatchBrowserEvent('info', [
            'message' => 'Liked!!',
        ]);
    }
}
