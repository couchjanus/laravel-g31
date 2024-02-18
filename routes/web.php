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

Route::get('/hello', function () {
    return view('hello', ['name' => "Laravel"]);
});

// Route::get('home', "App\Http\Controllers\HomeController@index");

// Route::get('name/{name}', "App\Http\Controllers\HomeController@show");

use App\Http\Controllers\HomeController;
Route::patch('name', [HomeController::class, 'show'])->name('home.test');
Route::get('home', [HomeController::class, 'index'])->name('home.page');

use App\Http\Controllers\Admin\{DashdoardController, BrandController};


Route::get('admin', DashdoardController::class)->middleware('auth')->name('admin');


Route::resource('admin/brands', BrandController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
