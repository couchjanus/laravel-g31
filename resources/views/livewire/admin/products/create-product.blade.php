<div>
    <x-slot name="header">
    <div class="flex justify-between">
    <h2 class="px-4 text-xl text-gray-800">{{ __('Create Product') }}</h2>
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
            <x-button>Create product</x-button>
        </div>

    </form>
   </div>
</div>
