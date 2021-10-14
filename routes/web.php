<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CKEditorController;

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
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/about-us', [HomeController::class,'aboutUs'])->name('about-us');
Route::get('/product/{id}',[ProductController::class, 'productShow'])->name('product.show');
Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');

Route::post('comments', Config::get('comments.controller') . '@store')->name('comments.store');
Route::delete('comments/{comment}', Config::get('comments.controller') . '@destroy')->name('comments.destroy');
Route::put('comments/{comment}', Config::get('comments.controller') . '@update')->name('comments.update');
Route::post('comments/{comment}', Config::get('comments.controller') . '@reply')->name('comments.reply');