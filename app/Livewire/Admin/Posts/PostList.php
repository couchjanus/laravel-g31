<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};


#[Title('Post List')]
#[Layout('layouts.admin')]
class PostList extends Component
{
    public function render()
    {
        return view('livewire.admin.posts.post-list');
    }
}
