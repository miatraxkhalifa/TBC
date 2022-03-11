<?php

namespace App\Http\Livewire;

use App\Models\Social;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SocialLinks extends Component
{
    use AuthorizesRequests;

    public $name;
    public $link;

    public function mount(Social $social)
    {
        $this->socials = $social->get();

    }

    public function render()
    {
        return view('livewire.social-links');
    }

    public function update($id)
    {
        $this->authorize('viewAny', App\Models\User::class); 
  
        if (isset($this->link[$id])) {
            $save = $this->socials->find($id);
            $save->link = $this->link[$id];
            $save->save();
            $this->dispatchBrowserEvent('success', [
                'message' => 'Social Media Link Added',
            ]);       
        } else {
            $this->dispatchBrowserEvent('warning', [
                'message' => 'An error has occurred',
            ]);   
        }
    }
}
