<div class="pt-10 mt-10 border-t border-gray-100">

    <h2>Discussions</h2>

    @auth
        <textarea wire:model="comment" cols="30" rows="7"></textarea>
        <button wire:click="postComment">Post comment</button>

    @else
        <a wire:navigation href="route('login')">Login to post comment</a>
    @endauth

    <div>
        @forelse ($this->comments as $comment)
            <div>
                <div>
                    <x-main.posts.author :author="$comment->user" />
                    <span>{{ $comment->created_at }}</span>
                </div>
                <div>{{ $comment->comment }}</div>
            </div>
        @empty
            <div>No comments yet</div>
        @endforelse

    </div>
    {{ $this->comments->links() }}

</div>
