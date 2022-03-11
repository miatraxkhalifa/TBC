<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use App\Models\Comment;

class MainDashboard extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
       
        return view('livewire.admin.main-dashboard', [
            'post' => count(Post::where('status', 1)->get()),
            'contributor' => count(Post::select('users_id')->where('status', 1)->distinct()->get()),
            'view' => Post::sum('views'),
            'comment' => Comment::count('id'),
        ]);
    }

    public function updatingQ() 
    {
        $this->resetPage();
    }


}
