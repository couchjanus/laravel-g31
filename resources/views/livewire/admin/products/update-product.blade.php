<div>
    <x-slot name="header">
    <div class="flex justify-between">
    <h2 class="px-4 text-xl text-gray-800">{{ __('Edit Product') }}</h2>
    <a href="{{ route('admin.products.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">All products</a>
    </div>
   </x-slot>

   <div class="flex flex-col min-w-0 flex-1 overflow-hidden px-4 py-4">
    <form method="POST"  class="" wire:submit="save">
        <div class="mb-3">
            <x-admin.form.input wire:model.blur="form.name" hint="Write product name here ..."></x-admin.form.input>
        </div>
         <div class="mb-3">
            <x-admin.form.number wire:model.blur="form.price"  hint="Write product price here ..."></x-admin.form.number>
        </div>
        <div class="mb-3">
            <x-admin.form.textarea wire:model.blur="form.description"  hint="Write product description here ..."></x-admin.form.textarea>
        </div>

        <div class="mb-3">
            <div class="inline-flex space-x-4">
            @foreach ($productStatus as $key => $value)
            <x-admin.form.radio wire:model.blur="form.status" :value="$value">{{ $key }}</x-admin.form.radio>
            @endforeach
            </div>
        </div>

        <div class="mb-3">
            <x-admin.form.select wire:model.blur="form.category_id"  :options="$categories">Choose Category</x-admin.form.select>
        </div>

        <div class="mb-3">
            <x-admin.form.select wire:model.blur="form.brand_id"  :options="$brands">Choose Brand</x-admin.form.select>
        </div>

        <div class="mb-3">

<div class="flex items-center justify-center w-full">
    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
        @if ($form->oldCover)
            <img src="{{ asset(Storage::url($form->oldCover)) }}" class="object-cover h-48"
        @endif
        @if ($form->cover)
            <img src="{{ $form->cover->temporaryUrl() }}" class="object-cover h-48"
        @endif
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input id="dropzone-file" type="file" class="hidden" wire:model.blur="form.cover"  />
    </label>
</div>

        </div>

        <div class="mb-3">
            <x-button>Create product</x-button>
        </div>

    </form>
   </div>
</div>
