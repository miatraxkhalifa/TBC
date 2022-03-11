<?php

namespace App\Http\Livewire\Post;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class View extends Component
{
    use WithPagination;

    public $deleteModal, $q;
    public $sortBy = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'q' => ['except' => ''],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function render()
    {
        $posts = Post::where('users_id', auth()->user()->id)->with('User')->with('Category')
            ->when($this->q, function ($query) {
                return $query->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->q . '%')
                        ->orwherehas('Category', function ($query) {
                            $query->where('name', 'LIKE', '%' . $this->q . '%');
                        });
                });
            })
            ->OrderBy($this->sortBy, $this->sortDirection)
            ->paginate('12');
        return view('livewire.post.view', [
            'posts' => $posts,
        ]);
    }

    public function updatingQ()
    {
        $this->resetPage();    //Search box to reset page
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortBy = $field;
    }

    public function delete($id)
    {
        $this->deleteModal = $id;
    }

    public function confirmDelete(Post $id)
    {
        $id->find($this->deleteModal)->delete();
        $this->deleteModal = false;
        $this->dispatchBrowserEvent('warning', [
            'message' => 'Post Removed',
        ]);
    }
}
