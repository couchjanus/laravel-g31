<x-main-layout title="Blog">
    <div class="grig w-full grid-cols-4 gap-10">
        <div class="col-span-4 md:col-span-3">
            <livewire: main.blog-page></livewire:>
        </div>
        <div id="side-bar" class="sticky top-0 h-screen col-span-4 px-3 py-6 pt-10 space-4-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
        @include('main.posts.partials.search-box')
        @include('main.posts.partials.tags-box')
        </div>
    </div>
</x-main-layout>
