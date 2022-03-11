<?php

namespace App\Http\Livewire\Admin\Table;

use App\Models\Category as ModelCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Category extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $remove = false; 
    public $add = false;
    public $name;

    protected $rules = [
        'name' => 'required|min:1|max:60',
    ];

    protected $messages = [
        'name.required' => 'Hmm.. keep trying..',
        'name.*' => 'Something is wrong..',
    ];

    public function render()
    {
        $category = ModelCategory::orderby('name','ASC')->withCount('countPost')->paginate('49');
        return view('livewire.admin.table.category', [
            'category' => $category,
        ]);
    }

    public function addCategory()
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $this->add = true;
    }

    public function confirmedAdd()
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $validation = Validator::make([
            'name' => $this->name,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();
            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }

        $name = explode(', ', $this->name);
        foreach($name as $key => $value) {
            ModelCategory::make(['name' => $value])->save();
        }
        $this->add = false;
        $this->dispatchBrowserEvent('success', [
            'message' => 'Categories Added'
        ]);
    }

    public function removeCategory($id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $this->remove = $id;
    }

    public function confirmedRemove(ModelCategory $id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $id->find($this->remove)->delete();
        $this->dispatchBrowserEvent('success', [
            'message' => 'Category Removed'
        ]);
        $this->remove = false;
    }
}
