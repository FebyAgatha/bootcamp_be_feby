<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakturController;

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

Route::get('/', [ProductController::class, 'allProd'])->name('homepage')->middleware('auth');
Route::get('/add/product', [ProductController::class, 'addProd'])->name('addProd');
Route::post('/store/product', [ProductController::class, 'storeProd'])->name('storeProd');
Route::get('/product/{id}', [ProductController::class, 'prod'])->name('detailProd');
Route::get('/edit/product/{id}', [ProductController::class, 'editProduct'])->name('editProd');
Route::patch('/update/product/{id}', [ProductController::class, 'updateProduct'])->name('updateProd');
Route::delete('/delete/product/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProd');

Route::get('/add/category', [CategoryController::class, 'create'])->name('addCat');
Route::post('/store/category', [CategoryController::class, 'store'])->name('storeCat');
Route::get('/show/category', [CategoryController::class, 'show'])->name('showCat');
Route::get('/category/{id}', [CategoryController::class, 'detail'])->name('categoryDetail');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('editCat');
Route::patch('/update/category/{id}', [CategoryController::class, 'update'])->name('updateCat');
Route::delete('/delete/category/{id}', [CategoryController::class, 'delete'])->name('deleteCat')->middleware('is_admin');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/faktur', [FakturController::class, 'see'])->name('see');

