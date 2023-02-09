<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/service', [SiteController::class, 'getService']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/dashboard', [SiteController::class, 'getDashboard']);

Route::get('/product', [SiteController::class, 'getManageProduct'])->name('getManageProduct');

Route::get('/category', [SiteController::class, 'getCategory'])->name('getCategory');

Route::get('/order', [SiteController::class, 'getOrder'])->name('getOrder');

Route::get('/addProducts', [SiteController::class, 'getAddProducts'])->name('getAddProducts');

Route::post('/addProducts', [SiteController::class, 'postAddProducts'])->name('postAddProducts');

Route::get('product/delete/{product}', [SiteController::class, 'getDeleteProduct'])->name('getDeleteProduct');

Route::get('product/delete/{product}', [SiteController::class, 'getDelete'])->name('getDelete');

Route::get('/editProduct/{product}', [SiteController::class, 'getEditProduct'])->name('getEditProduct');

Route::post('/editProduct/{product}', [SiteController::class, 'postEditProduct'])->name('postEditProduct');



Route::get('/addCategory', [SiteController::class, 'getAddCategory'])->name('getAddCategory');

Route::post('/addCategory', [SiteController::class, 'postAddCategory'])->name('postAddCategory');

Route::get('/editCategory/{category}', [SiteController::class, 'getEditCategory'])->name('getEditCategory');

Route::post('/editCategory/{category}', [SiteController::class, 'postEditCategory'])->name('postEditCategory');

Route::get('/deleteCategory/{category}', [SiteController::class, 'getDeleteCategory'])->name('getDeleteCategory');

Route::get('/showProduct', [SiteController::class, 'getShowProduct']);

Route::post('/getajaxproduct', [SiteController::class, 'getajaxproduct']);