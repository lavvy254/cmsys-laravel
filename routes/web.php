<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrayerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/users', [UserController::class, 'index'])->name('user.index');
	Route::get('/add', [UserController::class, 'create'])->name('user.add');
	Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
	Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
	Route::post('/store', [UserController::class, 'store'])->name('user.store');	
	Route::delete('/users/{user}',[UserController::class,'destroy'])->name('user.delete');
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('/create', [PrayerController::class, 'create'])->name('prayer.add');
	Route::get('/prayer/{prayer}/edit', [PrayerController::class, 'edit'])->name('prayer.edit');
	Route::put('/prayer/{prayer}', [PrayerController::class, 'update'])->name('prayer.update');
	Route::post('/store', [PrayerController::class, 'store'])->name('prayer.store');
    Route::delete('/prayer/{prayer}',[PrayerController::class,'destroy'])->name('prayer.delete');	
});

