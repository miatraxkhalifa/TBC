<?php

namespace App\Http\Livewire\Post;

use App\Models\Body;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $name, $status, $category, $message1, $message2, $message3, $message4, $edit;
    public $image1, $image2, $image3, $image4;
    public $group1 = true;
    public $group2, $group3, $group4 = false;

    public Post $post;


    protected $listeners = ['refreshPage' => '$refresh'];

    protected $rules = [
        'name' => 'required|min:6|max:30|',
        'message1' => 'required|min:1',
        'message2' =>  'nullable',
        'message3' =>  'nullable',
        'message4' =>  'nullable',
        'category' => 'required',
        'image1' =>  'nullable|image|max:1024',
        'image2' =>  'nullable|image|max:1024',
        'image3' =>  'nullable|image|max:1024',
        'image4' =>  'nullable|image|max:1024',
    ];

    protected $messages = [
        'name.required' => 'No post title?..',
        'name.min' => 'Title too short..',
        'name.max' => 'What along title..',
        'name' => 'Something happened ..',
        'message1.*' => 'Put some content..',
        'category.*' => 'Pick a category!',
        'image1.*' => 'file is not an image or it is too big',
        'image2.*' => 'file is not an image or it is too big',
        'image3.*' => 'file is not an image or it is too big',
        'image4.*' => 'file is not an image or it is too big',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $edit =  Post::where('id', $post->id)->with('Category')->with('Body')->first();
        $this->groupSwitch();

        $this->name = $edit['name'];

        $category[] = '';


        foreach ($edit->category as $key => $value) {
            $category[$key] = $value->id;
        }
        foreach ($edit->body as $key => $value) {
            $body[$key] = $value->body;    //$body is for Body Model
        }
        $this->category = $category;   // Category ID array
        $this->message1 = $body[0];   // Body Model body

        if (isset($body[1])) {
            $this->message2 = $body[1];
        }
        if (isset($body[2])) {
            $this->message3 = $body[2];
        }
        if (isset($body[3])) {
            $this->message4 = $body[3];
        }
    }

    public function render()
    {
        return view('livewire.post.edit');
    }

    public function groupSwitch()
    {

        $count = count(Body::where('post_id', $this->post->id)->get());
        //  dd($count);
        switch ($count) {
            case 1:
                $this->group1 = true;
                $this->group2 = false;
                $this->group3 = false;
                $this->group4 = false;
                break;
            case 2:
                $this->group1 = true;
                $this->group2 = true;
                $this->group3 = false;
                $this->group4 = false;
                break;
            case 3:
                $this->group1 = true;
                $this->group2 = true;
                $this->group3 = true;
                $this->group4 = false;
                break;
            case 4:
                $this->group1 = true;
                $this->group2 = true;
                $this->group3 = true;
                $this->group4 = true;
                break;
            default:
            $this->dispatchBrowserEvent('error', [
                'message' => 'An error has occurred..'
            ]);
                break;
        }
    }

    public function storeCategories($postvalue)
    {
        CategoryPost::where('posts_id', $postvalue)->delete();
        foreach ($this->category as $key => $value) {
            CategoryPost::updateOrcreate(
                ['posts_id' => $postvalue, 'categories_id' => $value],
                [],
            );
        }
    }

    public function storeimage1($section)
    {
        if ($this->image1 != null) {
            $FileName = auth()->user()->name . '_' . now() . '_' . '.' . $this->image1->getClientOriginalExtension();
            Storage::disk("google")->putFileAs("", $this->image1,  $FileName); //save the file to google drive
            $files = Storage::disk("google")->listContents(); //get the files uploaded in google drive
            usort($files, function ($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            $FILEID = end($files);
            $section->image = $FILEID['basename'];
            $section->save();
        }
    }

    public function storeimage2($section)
    {
        if ($this->image2 != null) {
            $FileName = auth()->user()->name . '_' . now() . '_' . '.' . $this->image2->getClientOriginalExtension();
            Storage::disk("google")->putFileAs("", $this->image2,  $FileName); //save the file to google drive
            $files = Storage::disk("google")->listContents(); //get the files uploaded in google drive
            usort($files, function ($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            $FILEID = end($files);
            $section->image = $FILEID['basename'];
            $section->save();
        }
    }

    public function storeimage3($section)
    {
        if ($this->image3 != null) {
            $FileName = auth()->user()->name . '_' . now() . '_' . '.' . $this->image3->getClientOriginalExtension();
            Storage::disk("google")->putFileAs("", $this->image3,  $FileName); //save the file to google drive
            $files = Storage::disk("google")->listContents(); //get the files uploaded in google drive
            usort($files, function ($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            $FILEID = end($files);
            $section->image = $FILEID['basename'];
            $section->save();
        }
    }

    public function storeimage4($section)
    {
        if ($this->image4 != null) {
            $FileName = auth()->user()->name . '_' . now() . '_' . '.' . $this->image4->getClientOriginalExtension();
            Storage::disk("google")->putFileAs("", $this->image4,  $FileName); //save the file to google drive
            $files = Storage::disk("google")->listContents(); //get the files uploaded in google drive
            usort($files, function ($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            $FILEID = end($files);
            $section->image = $FILEID['basename'];
            $section->save();
        }
    }

    public function submit()
    {
  
        $this->authorize('submit', $this->post);
        $validation = Validator::make([
            'name' => $this->name,
            'message1' => $this->message1,
            'category' => $this->category,
            'image1' => $this->image1,
            'image2' => $this->image2,
            'image3' => $this->image3,
            'image4' => $this->image4,
        ], $this->rules, $this->messages);

        if ($validation->fails()) {
            $errorMsg = $validation->getMessageBag();

            foreach ($errorMsg->getMessages() as $key => $value) {
                $this->dispatchBrowserEvent('error', ['message' => $value]);
            }
            $validation->validate();
        }

        $checkname = count($this->post->where('name', $this->name)->pluck('name'));
        if ($checkname >= 2) {
            $this->dispatchBrowserEvent('error', [
                'message' => 'Post title in use'
            ]);
        }
        
        $this->post->name = $this->name;
        $this->post->status = '0';
        $this->post->save();
        $this->storeCategories($this->post->id);

       $bodyarray = $this->post->Body()->where('post_id', $this->post->id)->get();
  
        $i = count($bodyarray);
      // dd($bodyarray[0]->id);
        switch ($i) {
            case 1:
              $switch1 =  $bodyarray[0]->update(['body' => $this->message1]);    
              $this->storeimage1($bodyarray[0]);
                break;
            case 2:
              $switch1 = $bodyarray[0]->update(['body' => $this->message1]);
              $switch2 = $bodyarray[1]->update(['body' => $this->message2]);  
              $this->storeimage1($bodyarray[0]);
              $this->storeimage2($bodyarray[1]);
                break;
            case 3:
                $switch1 = $bodyarray[0]->update(['body' => $this->message1]);
                $switch2 = $bodyarray[1]->update(['body' => $this->message2]);   
                $switch3 = $bodyarray[2]->update(['body' => $this->message3]);   
                $this->storeimage1($bodyarray[0]);
                $this->storeimage2($bodyarray[1]);
                $this->storeimage3($bodyarray[2]);
                break;
            case 4:
                $switch1 = $bodyarray[0]->update(['body' => $this->message1]);
                $switch2 = $bodyarray[1]->update(['body' => $this->message2]);   
                $switch3 = $bodyarray[2]->update(['body' => $this->message3]);   
                $switch3 = $bodyarray[3]->update(['body' => $this->message4]);   
                $this->storeimage1($bodyarray[0]);
                $this->storeimage2($bodyarray[1]);
                $this->storeimage3($bodyarray[2]);
                $this->storeimage4($bodyarray[3]);
                break; 

            default:
            $this->dispatchBrowserEvent('error', [
                'message' => 'An error has occurred..'
            ]);
            break;
        }

        $this->dispatchBrowserEvent('success', [
            'message' => 'Blog updated successfully'
        ]);
    }
}
