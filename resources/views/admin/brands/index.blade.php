<x-admin-layout>
<x-slot name="header">
    <div class="flex justify-between">
    <h2 class="px-4 text-xl text-gray-800">{{ __('Create Brand') }}</h2>
    <a href="{{ route('admin.brands.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add new</a>
    </div>
   </x-slot>


<table class="table-auto">
  <thead>
     <tr>
        <th>Brand Id</th>
        <th>Brand Name</th>
        <th>Created</th>
        <th>Actions</th>
     </tr>
  </thead>
  <tbody>
     @foreach($brands as $brand)
        <tr>
           <td>{{ $brand->id }}</td>
           <td>{{ $brand->name }}</td>
           <td>{{ $brand->created_at }}</td>
           <td class="inline-flex"><a href="{{ route('admin.brands.edit', $brand->id) }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
           <form method="POSt" class="inline-form" action="{{ route('admin.brands.destroy', $brand->id) }}">@csrf @method('delete')
           <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
           </form>
           </td>

        </tr>
     @endforeach
  </tbody>
</table>
{{ $brands->links() }}
</x-admin-layout>
