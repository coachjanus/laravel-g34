<?php

namespace App\Livewire\Forms\Admin;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostForm extends Form
{
    public ?Post $post;
 
    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required')]
    public $status = 0;
    
    #[Validate('required|min:5')]
    public $content = '';

    #[Validate('required')]
    public $user_id;
    public $cover;
    public $oldCover;
    public $slug;
    
    public array $tags = [];


    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title; 
        $this->slug = $post->slug; 
        $this->status = $post->status; 
        $this->content = $post->content; 
        $this->user_id = $post->user_id; 
  
        $this->oldCover = $post->cover;
    }


    public function store()
    {
        $this->user_id = Auth::id();
        $this->slug = Str::slug($this->title, '_');
        $this->validate();
        // dd($this->all());
        
       ;
        $this->cover = $this->cover->store('posts', 'public');
        $post = Post::create($this->all());
        $post->tags()->sync($this->tags);
    }

    public function update()
    {
        $this->validate();
        if ($this->cover) {
            if ($this->oldCover != null && Storage::disk('public')->exists($this->oldCover)) {
                Storage::disk('public')->delete($this->oldCover);
            }
            $this->cover = $this->cover->store('posts', 'public');
        } else {
            $this->cover = $this->oldCover;
        }
        $this->post->update($this->all());

    }
}
