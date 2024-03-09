@props(['post'])

<div>
    <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
    <img class="mx-auto mw-100 rounded-xl" src="{{ $post->getThumbnailUrl() }}">
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($tag = $post->tags->first())
                <x-main.posts.tag-badge :tag="$tag"></x-main.posts.tag-badge>
            @endif
            <p class="text-sm text-gray-500">{{ $post->published_at }}</p>

        </div>
        <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="text-xl font-bold text-gray-700">{{ $post->title }}</a>
    </div>
</div>
