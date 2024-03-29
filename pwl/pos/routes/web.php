<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/category/{category}', [ProductController::class, 'category']);

Route::get('/user/{id}/name/{name}', [UserController::class, 'index']);

Route::get('/transactions', [TransactionController::class, 'transactions']);
