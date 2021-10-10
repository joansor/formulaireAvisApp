<?php

use App\Http\Controllers\HomeController;
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

// Route::name('home')->get('/', function () {
//     return view('pages/home');
// });

Route::get('/about-us', function () {
    return view('pages/aboutUs');
})->name('aboutUs');

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/about-us', [HomeController::class,'aboutUs'])->name('aboutUs');
Route::get('/produit/{id}',[HomeController::class,'produitShow'])->name('produits.show');

// Route::post('comments', '\Laravelista\Comments\CommentController@store');
// Route::delete('comments/{comment}', '\Laravelista\Comments\CommentController@destroy');
//Route::put('comments/{comment}', '\Laravelista\Comments\CommentController@update');
// Route::post('comments/{comment}', '\Laravelista\Comments\CommentController@reply');
