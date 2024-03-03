<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title};


#[Title('Update Post')]
#[Layout('layouts.admin')]
class UpdatePost extends Component
{
    public function render()
    {
        return view('livewire.admin.posts.update-post');
    }
}
