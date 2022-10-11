<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'getAllToAdmin'])->name('categoriesToAdmin');
Route::post('/admin/categories', [App\Http\Controllers\CategoryController::class, 'create'])->name('createCategory');
Route::get('/admin/categories/{id}', [App\Http\Controllers\CategoryController::class, 'getByIdToAdmin'])->name('getCategory');
Route::post('/admin/categories/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('updateCategory');
Route::delete('/admin/categories/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');

Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'getAllToAdmin'])->name('productsToAdmin');
Route::post('/admin/products', [App\Http\Controllers\ProductController::class, 'create'])->name('createProduct');
Route::get('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'getByIdToAdmin'])->name('getProduct');
Route::post('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');
Route::delete('/admin/products/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('deleteProduct');
