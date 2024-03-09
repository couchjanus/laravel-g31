@props(['tag'])

<a wire:navigation href="{{ route('posts.index', ['tag' => $tag->slug]) }}" class="text-white bg-{{ \Illuminate\Support\Str::after($bg_color ?? 'ef4444', '#') }} rounded-xl px-3 py-1 text-base">{{ $tag->name }}</a>
