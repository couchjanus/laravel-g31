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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Livewire\Main\{Catalog, HomePage, ShoppingCart};
use App\Http\Controllers\PostController;

Route::get('', HomePage::class)->name('home');
Route::get('shop', Catalog::class)->name('shop');

Route::get('blog',[PostController::class, 'index'])->name('posts.index');
Route::get('blog/{post:slug}',[PostController::class, 'show'])->name('posts.show');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping.cart');



use App\Http\Controllers\Admin\{BrandController};

use App\Livewire\Admin\Products\{ProductList, CreateProduct, UpdateProduct};
use App\Livewire\Admin\Posts\{PostList, CreatePost, UpdatePost};
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout.index');
    Route::post('/checkout/order', [App\Http\Controllers\OrderController::class, 'placeOrder'])->name('checkout.place.order');

    Route::name('admin.')->prefix('admin')->group(function(){
        Route::get('', function() {
            return view('admin.index');
        });
        Route::resource('brands', BrandController::class);
        Route::get('products', ProductList::class)->name('products.index');
        Route::get('products/create', CreateProduct::class)->name('products.create');
        Route::get('products/{product}/edit', UpdateProduct::class)->name('products.edit');

        Route::get('posts', PostList::class)->name('posts.index');
        Route::get('posts/create', CreatePost::class)->name('posts.create');
        Route::get('posts/{post}/edit', UpdatePost::class)->name('posts.edit');
    });
});
