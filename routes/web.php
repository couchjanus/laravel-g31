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

use App\Http\Controllers\Admin\DashdoardController;
Route::get('admin', DashdoardController::class);
