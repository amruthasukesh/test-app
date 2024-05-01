<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


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

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login/user', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/userSave', [AdminController::class, 'userSave'])->name('user.save');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.index');

Route::get('/admin/product/list', [ProductController::class, 'listProduct'])->name('product.list');
Route::get('/admin/product/add', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/admin/product/save', [ProductController::class, 'saveProduct'])->name('product.save');
Route::get('/admin/product/edit/{id?}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/admin/product/update', [ProductController::class, 'updateProduct'])->name('product.update');
Route::get('/admin/product/delete/{id?}', [ProductController::class, 'deleteProduct'])->name('product.delete');
