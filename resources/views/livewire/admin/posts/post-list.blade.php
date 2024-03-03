<div>
   <x-slot name="header">
    <div class="flex justify-between px-6">
    <h2 class="px-4 text-xl text-gray-800">{{ __('Post management') }}</h2>
    <a href="{{ route('admin.posts.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add new</a>
    </div>
   </x-slot>

   <div class="px-4 py-4">
    @livewire('admin.posts.post-table')
   </div>
</div>
