<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
   <x-admin.sidebar.header></x-admin.sidebar.header>
   <nav class="text-white text-base font-semibold pt-3">
   <x-admin.sidebar.item url="/admin" fa_type="tachometer-alt" active=true>Dashboard</x-admin.sidebar.item>

   <x-admin.sidebar.item url="/admin/brands" fa_type="table">Brands</x-admin.sidebar.item>
   <x-admin.sidebar.item url="/admin/categories" fa_type="table">Categories</x-admin.sidebar.item>
  </nav>
</aside>
{{-- resources/views/components/admin/sidebar/header.blade.php --}}
<div class="p-6 text-center">
   <a href="/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
</div>

