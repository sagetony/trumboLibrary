<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminControlller;
use App\Http\Controllers\EditBookController;

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

Route::get('/', [BookController::class, 'index'])->name('main');

Route::get('/admin', [AdminControlller::class, 'index'])->name('admin');
Route::post('/admin', [AdminControlller::class, 'store'])->name('admin');
Route::post('/deletebook', [AdminControlller::class, 'deleteItem'])->name(
    'deletebook'
);

Route::get('/editbook', [EditBookController::class, 'index'])->name('editbook');
Route::post('/editbook', [EditBookController::class, 'store'])->name(
    'editbook'
);
