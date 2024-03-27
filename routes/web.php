<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('auth/login');
});


Auth::routes();
Route::resource('dashboard', DashboardController::class)->middleware('can:isAdminOperator');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/json', [\App\Http\Controllers\UserController::class, 'json'])->name('user.json');
Route::resource('user', UserController::class)->middleware('can:isSAdmin');
Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy')->middleware('can:isSAdmin');
Route::get('/user/reset-pass/{id}', 'App\Http\Controllers\UserController@reset_pass')->name('user.reset-pass')->middleware('can:isSAdmin');

Route::resource('organization', OrganizationController::class)->middleware('can:isSAdmin');
Route::get('/organization/disable/{id}', 'App\Http\Controllers\OrganizationController@disable')->middleware('can:isSAdmin');

Route::resource('category', CategoryController::class)->middleware('can:isAdmin');
Route::resource('product', ProductController::class)->middleware('can:isAdmin');
Route::resource('catalog', CatalogController::class)->only('index');



