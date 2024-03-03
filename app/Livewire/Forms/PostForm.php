<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;

use Illuminate\Support\Facades\Storage;


class PostForm extends Form
{

    public ?Post $post;

    #[Validate('required|min:5')]
    public $title;

    #[Validate('required|min:5')]
    public $content;

    #[Validate('required|integer')]
    public $status;

    #[Validate('required|array')]
    public array $tags = [];

    #[Validate('required|integer')]
    public $user_id;

    #[Validate('image|nullable')]
    public $cover;

    public $oldCover;

    #[Validate('date|nullable')]
    public $published_at;

    public  function store()
    {
        $this->validate();
        $this->cover = $this->cover->store('posts', 'public');
        $post = Post::create($this->all());
        $post->tags()->sync($this->tags);
        session()->flash('success', 'Post created successfully!');
    }
}
