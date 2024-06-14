<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;
    public PostForm $form;

    public function save()
    {
        $this->validate();
        $this->form->createPost();
        $this->dispatch('post-created');
    }

    public function render()
    {
        return view('livewire.posts.post-create')->layout('layouts.app');
    }
}
