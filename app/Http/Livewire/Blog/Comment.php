<?php

namespace App\Http\Livewire\Blog;

use App\Models\Comment as AppModelsComment;
use App\Models\CommentPost as ModelsComment;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Comment extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $post;
    public $new = false;
    public $body;

    protected $rules = [
        'body' => 'required',
    ];

    protected $messages = [
        'body.*' => '??..',
    ];

    public function mount($post)
    {
       $this->post = $post;
    }
    public function render()
    {
       $comments = ModelsComment::has('Comments')->where('posts_id', $this->post)
       ->WhereHas('Comments', function ($q){
        $q->orderBy('created_at', 'ASC');   //->latest()
         })->paginate('5'); 
    
        return view('livewire.blog.comment', [
            'comments' => $comments,
        ]);
    }

    public function add($id)
    {
        $this->body= '';
        if(Auth::check()) {
        $this->new = $id;
        }
        else {
            return redirect()->route('login');
        }
    }

    public function delete($id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        AppModelsComment::where('id', $id)->delete();
        $this->dispatchBrowserEvent('info', [
            'message' => 'Comment removed'
        ]);
    }

    public function save()
    {
        $validation = Validator::make([
            'body' => $this->body,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }

        $comments = AppModelsComment::create([
            'body' => $this->body,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ]);

        ModelsComment::create([
            'posts_id' => $this->new,
            'comments_id' => $comments->id,
        ]);

        $this->dispatchBrowserEvent('success', [
            'message' => 'Comment added'
        ]);
        $this->new = false;
        $this->emitSelf('refresh');
    }
}
