<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostForm extends Form
{

    #[Rule('required')]
    public $title = '';
    // #[Rule('image')]
    public $image;
    #[Rule('required')]
    public $content = '';

    public function setForm(Post $post)
    {
        $this->title = $post->title;
        $this->image = $post->image;
        $this->content = $post->content;
    }

    public function updatePost(Post $post, $image = null)
    {
        if ($image) {
            Storage::delete($post->image);
            $this->image = $image;
        }
        $post->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'image' => $this->image->store('public/photos'),
            'published_at' => false
        ]);
        session()->flash('status', 'Post successfully updated.');
    }

    public function createPost()
    {

        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'image' => $this->image->store('public/photos'),
            'published_at' => false
        ]);
        $this->reset();
        session()->flash('status', 'Post successfully created.');
    }
}
