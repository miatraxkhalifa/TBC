<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Users extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $deleteModal = false;
    public $editModal = false;

    public $roles = '';
    public $roles_list = [];

    public $name, $q;

    public $sortBy = 'name';
    public $sortDirection = 'asc';
    protected $queryString = [
        'q' => ['except' => ''],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function render()
    {
        $roleuser = Role::select('id', 'title')->get();

        $users = User::with('Role')->withCount('countPost')->when($this->q, function ($query) {
            return $query->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->q . '%')->orwhere('email', 'LIKE', '%' . $this->q . '%')
                    ->orwherehas('Role', function ($query) {
                        $query->where('title', 'LIKE', '%' . $this->q . '%');
                    });
            });
        })
            ->OrderBy($this->sortBy, $this->sortDirection)
            ->paginate('12');


        return view('livewire.users', [
            /*  'users' => User::with('Role')->with(['Post' => function ($query) {
            $query->where('status', 1);}])->paginate('12'),  //this works but below is cleaner*/
            'users' => $users,
            'roleuser' => $roleuser,
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
        $this->authorize('viewAny', App\Models\User::class); 
        $this->deleteModal = $id;
    }

    public function edit($id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $this->editModal = $id;
    }

    public function confirmDelete(User $id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $id->find($this->deleteModal)->delete();
        $this->deleteModal = false;
        $this->dispatchBrowserEvent('warning', [
            'message' => 'User Removed',
        ]);
    }

    public function confirmEdit(RoleUser $id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        if ($this->roles == null) {
            $this->editModal = false;
        } else {
            $id->where('users_id', $this->editModal)->delete();

            foreach ($this->roles as $key => $value) {
                RoleUser::updateOrcreate(
                    ['users_id' => $this->editModal, 'roles_id' => $value],
                    [],
                );
            }
            $this->editModal = false;
            $this->dispatchBrowserEvent('info', [
                'message' => 'User Role Updated',
            ]);
        }
    }
}
