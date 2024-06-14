<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class PostIndex extends Component
{

    public function delete($id)
    {
        $post = Post::find($id);
        if ($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();
    }


    #[On('post-updated', 'post-created')]
    public function render()
    {
        return view('livewire.posts.post-index', [
            'posts' => Post::all()
        ])->layout('layouts.app');
    }
}
