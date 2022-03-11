<?php

namespace App\Http\Livewire\Post;

use App\Models\Body;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    use WithFileUploads;

    public $name;

    public $message1, $message2, $message3, $message4;
    public $image1, $image2, $image3, $image4;
    public $add = true, $remove = false;
    public $group1 = false, $group2 = false, $group3 = false;
    public $i = 0;

    public $category = [];

    protected $rules = [
        'name' => 'required|min:6|max:30|unique:posts',
        'message1' => 'required|min:1',
        'message2' =>  'nullable',
        'message3' =>  'nullable',
        'message4' =>  'nullable',
        'image1' =>  'nullable|image|max:1024',
        'image2' =>  'nullable|image|max:1024',
        'image3' =>  'nullable|image|max:1024',
        'image4' =>  'nullable|image|max:1024',
        'category' => 'required',
    ];

    protected $messages = [
        'name.required' => 'No post title?..',
        'name.min' => 'Title too short..',
        'name.max' => 'What along title..',
        'name.unique' => 'Ohh. That title is taken..',
        'message1.*' => 'Put some content..',
        'category.*' => 'Pick a category!',
        'image1.*' => 'file is not an image or it is too big',
        'image2.*' => 'file is not an image or it is too big',
        'image3.*' => 'file is not an image or it is too big',
        'image4.*' => 'file is not an image or it is too big',
    ];

    public function render()
    {
        $categories = Category::orderby('name', 'ASC')->get();
        return view('livewire.post.add', [
            'categories' => $categories,
        ]);
    }

    public function addRows()
    {
        if ($this->i >= 2) {
            $this->add = false;
        }
        $this->i++;
        $this->remove = true;

        $this->groupSwitch();

        $this->dispatchBrowserEvent('info', [
            'message' => 'New Section Added'
        ]);
    }

    public function groupSwitch()
    {
        switch ($this->i) {
            case 1:
                $this->group1 = true;
                $this->group2 = false;
                $this->group3 = false;
                $this->message3 = '';
                $this->image3 = '';
                $this->message4 = '';
                $this->image4 = '';
                break;
            case 2:
                $this->group1 = true;
                $this->group2 = true;
                $this->group3 = false;
                $this->message4 = '';
                $this->image4 = '';
                break;
            case 3:
                $this->group1 = true;
                $this->group2 = true;
                $this->group3 = true;
                break;
            default:
                $this->group1 = false;
                $this->group2 = false;
                $this->group3 = false;
                $this->message2 = '';
                $this->image2 = '';
                $this->message3 = '';
                $this->image3 = '';
                $this->message4 = '';
                $this->image4 = '';
                break;
        }
    }


    public function removeRows()
    {
        $this->i--;
        $this->add = true;
        if ($this->i == 0) {
            $this->remove = false;
        }
        $this->groupSwitch();

        $this->dispatchBrowserEvent('warning', [
            'message' => 'Section Removed'
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->message1 = '';
        $this->image1 = '';
        $this->message2 = '';
        $this->image2 = '';
        $this->message3 = '';
        $this->image3 = '';
        $this->message4 = '';
        $this->image4 = '';
        $this->i = 0;
        $this->remove = false;
        $this->category = [];
        $this->groupSwitch();
    }

    public function dispatchError()
    {
        $this->dispatchBrowserEvent('error', [
            'message' => 'An error occurred. Missing Fields'
        ]);
        $this->groupSwitch();
    }

    public function dispatchSuccess()
    {
        $this->dispatchBrowserEvent('success', [
            'message' => 'Blog added successfully'
        ]);
        $this->resetInputFields();
    }

    public function storeCategories($post)
    {
        foreach ($this->category as $key => $value) {
            CategoryPost::create([
                'posts_id' => $post->id,
                'categories_id' => $value,
            ]);
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

        switch ($this->i) {
            case 0:
                $post = Post::create([
                    'name' => $this->name,
                    'users_id' => Auth()->user()->id,
                    'status' => '0',
                ]);
                $section = Body::create([
                    'body' => $this->message1,
                    'post_id' => $post->id,

                ]);

                $this->storeimage1($section);
                $this->storeCategories($post);
                $this->dispatchSuccess();
                break;
            case 1:
                if ($this->message1 == null || $this->message2 == null) {
                    $this->dispatchError();
                } else {
                    $post = Post::create([
                        'name' => $this->name,
                        'users_id' => Auth()->user()->id,
                        'status' => '0',
                    ]);
                    $section1 = Body::create([
                        'body' => $this->message1,
                        'post_id' => $post->id,

                    ]);
                    $section2 = Body::create([
                        'body' => $this->message2,
                        'post_id' => $post->id,
                    ]);
                    $this->storeimage1($section1);
                    $this->storeimage2($section2);
                    $this->storeCategories($post);
                    $this->dispatchSuccess();
                }
                break;
            case 2:
                if ($this->message1 == null || $this->message2 == null || $this->message3 == null) {
                    $this->dispatchError();
                } else {
                    $post = Post::create([
                        'name' => $this->name,
                        'users_id' => Auth()->user()->id,
                        'status' => '0',
                    ]);
                    $section1 = Body::create([
                        'body' => $this->message1,
                        'post_id' => $post->id,
                    ]);
                    $section2 = Body::create([
                        'body' => $this->message2,
                        'post_id' => $post->id,
                    ]);
                    $section3 = Body::create([
                        'body' => $this->message3,
                        'post_id' => $post->id,
                    ]);
                    $this->storeimage1($section1);
                    $this->storeimage2($section2);
                    $this->storeimage3($section3);
                    $this->storeCategories($post);
                    $this->dispatchSuccess();
                }
                break;
            case 3:
                if ($this->message1 == null || $this->message2 == null || $this->message3 == null || $this->message4 == null) {
                    $this->dispatchError();
                } else {
                    $post = Post::create([
                        'name' => $this->name,
                        'users_id' => Auth()->user()->id,
                        'status' => '0',
                    ]);
                    $section1 = Body::create([
                        'body' => $this->message1,
                        'post_id' => $post->id,
                    ]);
                    $section2 = Body::create([
                        'body' => $this->message2,
                        'post_id' => $post->id,
                    ]);
                    $section3 = Body::create([
                        'body' => $this->message3,
                        'post_id' => $post->id,
                    ]);
                    $section4 = Body::create([
                        'body' => $this->message4,
                        'post_id' => $post->id,
                    ]);
                    $this->storeimage1($section1);
                    $this->storeimage2($section2);
                    $this->storeimage3($section3);
                    $this->storeimage4($section4);
                    $this->storeCategories($post);
                    $this->dispatchSuccess();
                }
                break;
            default:
                $this->dispatchError();
                break;
        }
    }
}
