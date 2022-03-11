<?php

namespace App\Http\Livewire\Admin\Table;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Published extends Component
{
    use AuthorizesRequests;
    public Model $model;
    public $field;
    public $isPublished;
    public $uniqueId;
    public $published, $unpublished;

    public function mount()
    {
     //  $this->authorize('viewAny', App\Models\User::class); 
       $this->isPublished = (bool) $this->model->getAttribute($this->field);
       $this->uniqueId = uniqid();
    }

    public function render()
    {
       // $this->authorize('viewAny', App\Models\User::class); 
        return view('livewire.admin.table.published');
    }

    public function updating($field, $value)
    {
        $this->authorize('viewAny', App\Models\User::class); 
        $this->model->setAttribute($this->field, $value)->save();
     
        $this->dispatchBrowserEvent('success', [
            'message' => 'Blog updated successfully'
        ]);
        $this->emit('refreshComponent');
        $data = array(count(Post::where('status', 1)->select('id')->get()), count(Post::where('status', 0)->select('id')->get()));
        $this->emit('refreshCharts', $data);
       
    }

 
}
