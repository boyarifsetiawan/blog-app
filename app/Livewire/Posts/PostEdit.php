<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Livewire\Forms\PostForm;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public PostForm $form;
    public $image;
    public $post;

    public function edit()
    {
        $this->validate();
        $this->form->updatePost($this->post, $this->image);
        $this->dispatch('post-updated');
    }

    public function mount(Post $post)
    {
        $this->post = Post::find($post->id);
        $this->form->setForm($post, $this->image);
    }
    public function render()
    {
        return view('livewire.posts.post-edit')->layout('layouts.app');
    }
}
