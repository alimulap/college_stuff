<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;

//Route::get('/', [HomeController::class, 'index']);
Route::get('/', [WelcomeController::class, 'index']);

//Route::get('/products', [ProductController::class, 'index']);
//Route::get('/category/{category}', [ProductController::class, 'category']);
//Route::get('/transactions', [TransactionController::class, 'transactions']);
//Route::get('/user/{id}/name/{name}', [UserController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

//Route::get('/user', [UserController::class, 'index']);
//Route::get('/user/tambah', [UserController::class, 'tambah']);
//Route::post('/user/tambah/simpan', [UserController::class, 'tambah_simpan']);
//Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
//Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
//Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

Route::resource('m_user', POSController::class);

Route::get('/level', [LevelController::class, 'index']);
Route::get('/level/create', [LevelController::class, 'create']);
Route::post('/level', [LevelController::class, 'store']);

//Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::post('/kategori/update', [KategoriController::class, 'update']);
Route::get('/kategori/{id}/delete', [KategoriController::class, 'delete']);


//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
