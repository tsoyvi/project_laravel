<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Forms\FeedbackController;
use App\Http\Controllers\Forms\OrderController;

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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



Route::get('/', [HelloController::class, 'index'])
    ->name('/');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');


Route::get('/category/{category}', [CategoryController::class, 'show'])
    ->where('category', '\d+')
    ->name('category.show');


Route::get('/category/{id}/news/{idNews}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->where('idNews', '\d+')
    ->name('news.show');



Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::view('/', 'admin.index')
        ->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/feedback', AdminFeedbackController::class);
    Route::resource('/order', AdminOrderController::class);
});


Route::group(['as' => 'forms.', 'prefix' => 'forms'], function () {
    Route::resource('/feedback', FeedbackController::class);
    Route::resource('/order', OrderController::class);
});
