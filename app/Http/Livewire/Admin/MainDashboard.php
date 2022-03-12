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
            'view' => Post::where('status',1)->sum('views'),
            'comment' => Comment::with('Post')->WhereHas('Post', function ($q){
                $q->where('status', '1');   //->latest()
                 })->count('id'),
        ]);
    }

    public function updatingQ() 
    {
        $this->resetPage();
    }


}
