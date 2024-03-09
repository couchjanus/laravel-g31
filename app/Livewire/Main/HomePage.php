<?php

namespace App\Livewire\Main;

use Livewire\Component;

use Livewire\Attributes\{Layout, Title};
use App\Models\{Post};


#[Title('Home Page')]
#[Layout('layouts.main')]
class HomePage extends Component
{
    public $latestPosts;

    public function mount()
    {
        $this->latestPosts = Post::status()->with('user')->with('tags')->latest('updated_at')->take(3)->get();
    }
    public function render()
    {
        return view('livewire.main.home-page');
    }
}
