<div x-data="{
    query: '{{ request('search', '') }}'
}" x-on:keyup.enter.window="$dispatch('search', {search:query})" id="search-box">
<div>
    <h3 class="mb-3 text-lg font-semibold text-gray-700">Blog search</h3>
    <div class="flex items-center px-3 py-2 mb-3 bg-gray-100 w-62 rounded-2xl">
        <span>

        </span>
        <input x-model="query" class="w-40 ml-1 text-xl text-gray-600 bg-transparent border-none" type="text" placeholder="search blog">
        <a x-on:click="$dispatch('search', {search: query})" class="w-7 h-7 text-white bg-green-500 px-1 rounded-2xl"

    </div>
</div>
