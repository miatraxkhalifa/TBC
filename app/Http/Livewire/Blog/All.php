<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function render()
    {
        $posts = Post::where('status', 1)->withcount('Comment')->with('User', 'Category', 'Body')
        ->when($this->search, function($query) {
            return $query->where(function($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')->orwherehas('User', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%');
                })
                ->orwherehas('Category', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%');
                }); 
            });
         })
        ->paginate('10');
        return view('livewire.blog.all', [
            'posts' => $posts,
        ])  ->layout('layouts.post');
    }

    public function updatingQ()
    {
        $this->resetPage();    //Search box to reset page
    }
}
