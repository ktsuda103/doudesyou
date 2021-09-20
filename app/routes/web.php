<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\MypageController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/detail_word/{id}', [HomeController::class, 'detail_word'])->name('detail_word');
Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/store', [AdminController::class, 'store'])->name('store');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::post('/update', [AdminController::class, 'update'])->name('update');
Route::post('/delete', [AdminController::class, 'delete'])->name('delete');

Route::post('/store_post', [PostController::class, 'store_post'])->name('store_post');

Route::post('/store_stock', [StockController::class, 'store_stock'])->name('store_stock');
Route::post('/delete_stock', [StockController::class, 'delete_stock'])->name('delete_stock');
Route::get('/index_stock', [StockController::class, 'index_stock'])->name('index_stock');

Route::get('/index_contact', [ContactController::class, 'index_contact'])->name('index_contact');
Route::post('/confirm_contact', [ContactController::class, 'confirm_contact'])->name('confirm_contact');
Route::post('/thanks_contact', [ContactController::class, 'thanks_contact'])->name('thanks_contact');