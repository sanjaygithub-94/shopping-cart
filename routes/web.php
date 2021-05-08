<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('admin', AdminController::class);

Route::resource('category', CategoryController::class);
Route::get('edit-category/{id}', [CategoryController::class, 'editCategory']);
Route::post('update-category', [CategoryController::class, 'updateCategory']);
Route::post('delete-category/{id}', [CategoryController::class, 'deleteCategory']);

Route::resource('product', ProductController::class);
Route::get('edit-product/{id}', [ProductController::class, 'editProduct']);
Route::post('update-product', [ProductController::class, 'updateProduct']);
Route::post('delete-product/{id}', [ProductController::class, 'deleteProduct']);

Route::resource('user', UserController::class);
Route::get('edit-user/{id}', [UserController::class, 'editUser']);
Route::post('update-user', [UserController::class, 'updateUser']);
Route::post('delete-user/{id}', [UserController::class, 'deleteUser']);

Route::get('shopping', [ShoppingController::class, 'index']);

Route::get('add-to-cart/{id}', [ShoppingController::class, 'addToCart']);
Route::get('cart', [ShoppingController::class, 'getCartItems']);
Route::get('checkout', [ShoppingController::class, 'checkoutProducts']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
