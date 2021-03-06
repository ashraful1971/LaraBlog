<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\CategoryPageController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\PostPageController;
use App\Http\Controllers\Frontend\SearchPageController;
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

/**
 * 
 * Frontend routes
 */

Route::get('/', [HomePageController::class, 'index'])->name('homepage');
Route::get('/category/{slug}', [CategoryPageController::class, 'show'])->name('category.page');
Route::get('/post/{slug}', [PostPageController::class, 'show'])->name('post.page');
Route::get('/search', [SearchPageController::class, 'index'])->name('search.page');



/**
 * 
 * Backend Routes
 */

//For logged in users

Route::group([
        'prefix' => 'panel',
        'middleware' => 'auth'
    ], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'show'])->name('user.show');
    Route::put('/profile', [UserController::class, 'update'])->name('user.update');

    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.page');
    Route::put('/settings', [SettingController::class, 'storeOrUpdate'])->name('settings.update');
});

//For guest users

Route::group([
        'prefix' => 'panel',
        'middleware' => 'guest'
    ], function(){
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginCheck'])->name('login.check');
});

// For laravel file manager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});