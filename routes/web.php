<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\{BrandController};

use App\Livewire\Admin\Products\{ProductList, CreateProduct, UpdateProduct};

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::name('admin.')->prefix('admin')->group(function(){
        Route::get('', function() {
            return view('admin.index');
        });
        Route::resource('brands', BrandController::class);
        Route::get('products', ProductList::class)->name('products.index');
        Route::get('products/create', CreateProduct::class)->name('products.create');
        Route::get('products/{product}/edit', UpdateProduct::class)->name('products.edit');
    });
});
