<?php

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\SessionController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', RepositoryController::class);
Route::resource('repository', RepositoryController::class);
Route::get('/products', 'ProductController@index');
Route::get('/profil', 'ProfilController@index');
Route::get('/profil/{id}', 'ProfilController@show');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', function () {
    $products = App\Models\Product::all();
    return view('products.index', ['products' => $products]);
});
Route::resource('user', UserController::class)->middleware(['auth', 'can:isAdmin']);
Route::repository('repository', RepositoryController::class)->middleware('auth');