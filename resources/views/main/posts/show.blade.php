<x-main-layout>
<article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3">
    <img src="$post->getThumbnailUrl()" class="h-auto w-64 my-2 rounded-lg">
    <h1 class="text-4xl font-bold text-left text-gray-700">{{ $post->title }}</h1>
    <div class="flex items-center justify-between mt-2">
        <div class="flex items-center py-5">
            <x-main.posts.author :author="$post->user" size="md" />
            <span class="text-sm text-gray-500"> | {{ $post->getReadingTime() }} min read</span>
        </div>
        <div class="flex items-center">
            <span class="mr-2 text-gray-500">{{ $post->updated_at->diffForHumans() }}</span>
        </div>
    </div>

    <div class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
        <div class="flex items-center">
            <livewire:main.like-button :key="'like-' . $post->id" :$post />
        </div>
         <div class="flex items-center">

        </div>
    </div>

    <div class="py-3 text-lg text-justify text-gray-700">
        {{ $post->content }}
    </div>

    <div class="flex items-center mt-10 space-x-4">
        @foreach ($post->tags as $tag)
            <x-main.posts.tag-badge :tag="$tag"></x-main.posts.tag-badge>
        @endforeach
    </div>
    <livewire:main.post-comments :key="'comments'. $post->id" :$post />
</article>

</x-main-layout>
