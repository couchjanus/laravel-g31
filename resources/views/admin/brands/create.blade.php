<x-admin-layout>
<x-slot name="header">
    <div class="flex justify-between">
    <h2 class="px-4 text-xl text-gray-800">{{ __('Create Brand') }}</h2>
    <a href="{{ route('admin.brands.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">All brands</a>
    </div>
   </x-slot>

<div class="py-12 px-6">
    <div class="grid grid-cols-1 gap-6">
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        @foreach ($errors as $error)
            <li><span class="font-medium">Danger alert!</span> {{ $error }}</li>
        @endforeach
        </div>
    @endif
    </div>
</div>

<form class="max-w-sm mx-auto" method="POST" action="{{ route('admin.brands.store') }}">@csrf
  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name')
        is-invalid
    @enderror" placeholder="Brand name" required  name="name" />
    @error('name')
       <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">{{ $message }}</div> 
    @enderror
  </div>

  <div class="flex items-start mb-5">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
  <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  @error('description')
        is-invalid
    @enderror" placeholder="Description..." name="description"></textarea>
    @error('description')
       <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">{{ $message }}</div> 
    @enderror

  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
</form>

</x-admin-layout>
