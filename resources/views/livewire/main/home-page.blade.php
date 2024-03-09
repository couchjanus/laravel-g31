<div>
    <x-slot name="header">
        <div class="w-full text-center">
            <h1 class="text-2xl font-bold text-center text-gray-700">
                Welcome to <span class="text-yellow-500">Shopaholic</span> <span class="text-gray-800">News</span>
            </h1>
            <p class="text-gray-500 mt-1">Best Blog in the universe.</p>
        </div>

    </x-slot>


    <div class="mb-10">
        <h2 class="mt-16 mb-5 text-2xl text-yellow-500 font-bold">Latest Posts</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <x-main.posts.post-card :post="$post" class="col-span-3 md:col-span-1"></x-main.posts.post-card>
                @endforeach
            </div>
        </div>
    </div>
</div>
