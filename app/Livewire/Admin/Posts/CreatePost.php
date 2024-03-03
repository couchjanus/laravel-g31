<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};

use App\Enums\PostStatus;


use App\Models\{User, Tag, Post};
use App\Livewire\Forms\PostForm;

use Livewire\WithFileUploads;
use Nette\Utils\Arrays;

#[Title('Create post')]
#[Layout('layouts.admin')]
class CreatePost extends Component
{
    use WithFileUploads;

    public $users;
    public Array $tags;
    public Array $postStatus;

    public PostForm $form;

    public function mount():void
    {
        $this->tags = Tag::all('id', 'name')->toArray();
        $this->users = User::pluck('name', 'id');
        $this->postStatus = PostStatus::options();
    }

    public function save()
    {
        $this->form->store();
        return $this->redirect('/admin/posts');
    }


    public function render()
    {
        return view('livewire.admin.posts.create-post');
    }
}
