<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::any('/', [HomeController::class,'home'])->name('home');

Route::get('/about-us', [HomeController::class,'aboutUs'])->name('about-us');
Route::get('/product/{id}',[ProductController::class, 'productShow'])->name('product.show');

Route::post('comments', Config::get('comments.controller') . '@store')->name('comments.store');
Route::post('comments/{comment}', Config::get('comments.controller') . '@reply')->name('comments.reply');
Route::delete('comments/{comment}', Config::get('comments.controller') . '@destroy')->name('comments.destroy');
Route::put('comments/{comment}', Config::get('comments.controller') . '@update')->name('comments.update');



Route::get('product/{id}/sort/{sort}',['middleware' => 'auth', CommentController::class,'processingSort'])->name('comments.processingSort');


