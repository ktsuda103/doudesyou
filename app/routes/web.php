<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail_word/{id}', [HomeController::class, 'detail_word'])->name('detail_word');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update', [AdminController::class, 'update'])->name('update');
Route::post('/delete', [AdminController::class, 'delete'])->name('delete');
