<div>
    <x-slot name="header">
    <div class="flex justify-between px-6">
    <h2 class="px-4 text-xl text-gray-800">{{ __('Create Post') }}</h2>
    <a href="{{ route('admin.posts.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">All posts</a>
    </div>
   </x-slot>

   <div class="flex flex-col min-w-0 flex-1 overflow-hidden px-6 py-4">
    <form method="POST"  class="" wire:submit="save">
        <div class="mb-3">
            <x-admin.form.input wire:model.blur="form.title" hint="Write title  here ..."></x-admin.form.input>
            <div>@error('form.title') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <x-admin.form.textarea wire:model.blur="form.content"  hint="Write content here ..."></x-admin.form.textarea>
            <div>@error('form.content') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <div class="inline-flex space-x-4">
            @foreach ($postStatus as $key => $value)
            <x-admin.form.radio wire:model.blur="form.status" :value="$value">{{ $key }}</x-admin.form.radio>
            @endforeach
            </div>
        </div>


        <div class="mb-3">
            <x-input type="date" wire:model.blur="form.published_at" hint="Choose a date here ..." label="Published date: {{ $form->published_at }}"></x-input>
            </div>
        </div>
        {{-- <div class="mb-3">
            <x-select.native wire:model.blur="form.user_id" :options="$users" />
        </div> --}}

         <div class="mb-3">
            <x-admin.form.select wire:model.blur="form.user_id"  :options="$users">Choose User</x-admin.form.select>
        </div>


        <div class="mb-3">
            <x-select.styled
             wire:model.blur="form.tags"
             :options="$tags"
             select="label:name|value:id"
             multiple></x-select.styled>
        </div>

        <div class="mb-3">

        <div class="flex items-center justify-center w-full mt-4">

            <label for="dropzone-file" class="flex items-center justify-between w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                <div class="flex-col flex-1 items-center pt-5 pb-6">
                @if ($form->cover)
                    <img src="{{ $form->cover->temporaryUrl() }}" class="object-cover h-48 w-96">
                @endif
                </div>
                <div class="flex-col flex-1 items-center  pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>

                <input id="dropzone-file" type="file" class="hidden"   wire:model="form.cover" />
            </label>

        </div>


        </div>

        <div class="mb-3">
            <x-button>Create post</x-button>
        </div>

    </form>
   </div>
</div>
