<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
   <x-admin.sidebar.header></x-admin.sidebar.header>
   <nav class="text-white text-base font-semibold pt-3">
   <x-admin.sidebar.item url="/admin" fa_type="tachometer-alt" active=true>Dashboard</x-admin.sidebar.item>

   <x-admin.sidebar.item url="/admin/brands" fa_type="table">Brands</x-admin.sidebar.item>
   <x-admin.sidebar.item url="/admin/categories" fa_type="table">Categories</x-admin.sidebar.item>
   <x-admin.sidebar.item url="/admin/products" fa_type="table">Products</x-admin.sidebar.item>
   <x-admin.sidebar.item url="/admin/posts" fa_type="table">Posts</x-admin.sidebar.item>
   <x-admin.sidebar.item url="/admin/tags" fa_type="table">Tags</x-admin.sidebar.item>
   <x-admin.sidebar.item url="/admin/users" fa_type="table">Users</x-admin.sidebar.item>
  </nav>
</aside>
{{-- resources/views/components/admin/sidebar/header.blade.php --}}


