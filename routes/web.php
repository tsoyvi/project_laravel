<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

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



Route::get('/hello', [HelloController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');

Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

Route::get('/category/{id}/news/{idNews}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->where('idNews', '\d+')
    ->name('news.show');

