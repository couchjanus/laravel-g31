<div>
<h3 class="mb-3 text-lg font-semibold text-gray-700">Recommended topics</h3>
<div class="flex flex-wrap justify-start gap-2 topics">
    @foreach ($tags as $tag)
        <x-main.posts.tag-badge :tag="$tag"></x-main.posts.tag-badge>
    @endforeach
</div>
</div>
