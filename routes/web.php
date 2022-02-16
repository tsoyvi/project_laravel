<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Forms\FeedbackController;
use App\Http\Controllers\Forms\OrderController;

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

use App\Http\Controllers\SocialController;

use Illuminate\Support\Facades\Auth;
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


Route::get('/category/{category}/news/{news}', [NewsController::class, 'show'])
    ->where('category', '\d+')
    ->where('news', '\d+')
    ->name('news.show');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');


    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

        Route::view('/', 'admin.index')
            ->name('index');

        Route::get('/parser', ParserController::class)
            ->name('parser');

        Route::get('/load', [ParserController::class, 'load'])
            ->name('load');

        Route::get('/loadAll', [ParserController::class, 'loadAll'])
            ->name('loadAll');


        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/feedback', AdminFeedbackController::class);
        Route::resource('/order', AdminOrderController::class);
        Route::resource('/resource', AdminResourceController::class);
        Route::resource('/user', AdminUserController::class);
    });
});



Route::group(['as' => 'forms.', 'prefix' => 'forms'], function () {
    Route::resource('/feedback', FeedbackController::class);
    Route::resource('/order', OrderController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'guest'], function () {

    Route::get('auth/{network}/redirect', [SocialController::class, 'redirect'])
        ->name('auth.redirect')
        ->where('network', '\w+');

    Route::get('auth/{network}/callback', [SocialController::class, 'callback'])
        ->name('auth.callback')
        ->where('network', '\w+');
});
