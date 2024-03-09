<?php

namespace App\Livewire\Main;

use Livewire\Component;

use Livewire\Attributes\{Computed, Layout, Title, Rule};
use App\Models\{Post};
use Livewire\WithPagination;

#[Title('Post comments')]
#[Layout('layouts.main')]
class PostComments extends Component
{
    use WithPagination;

    public Post $post;

    #[Rule('required|min:3|max:2048')]
    public string $comment;

    public function postComment()
    {
        $this->validateOnly('comment');
        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
        ]);
        $this->reset('comment');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->post?->comments()->with('user')->latest()->paginate(5);
    }

    public function render()
    {
        return view('livewire.main.post-comments');
    }
}
