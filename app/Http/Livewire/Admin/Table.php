<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{

    use WithPagination;

    public $q;
    public $sortBy = 'name';
    public $sortDirection = 'asc';
    protected $queryString = [
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id',],
        'sortDirection' => ['except' => 'asc'],
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        $data = Post::when($this->q, function($query) {
            return $query->where(function($query) {
                $query->where('name', 'LIKE', '%' . $this->q . '%');
            });
         })
        ->OrderBy($this->sortBy, $this->sortDirection)
        ->paginate('12');

        return view('livewire.admin.table', [
            'data' => $data
        ]);

    }

    public function updatingQ() 
    {
        $this->resetPage();
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

}
