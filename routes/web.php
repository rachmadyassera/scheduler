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

//====================== GUEST ====================================
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/user/json', [\App\Http\Controllers\UserController::class, 'json'])->name('user.json');
// Route::resource('catalog', CatalogController::class)->only('index');

// ======================= ALL ROLE ==================================
Route::resource('dashboard', DashboardController::class)->middleware('can:isAdminOperator');


//========================= SUPER ADMIN ===============================

Route::resource('user', UserController::class)->middleware('can:isSAdmin');
Route::get('/user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy')->middleware('can:isSAdmin');
Route::get('/user/reset-pass/{id}', 'App\Http\Controllers\UserController@reset_pass')->name('user.reset-pass')->middleware('can:isSAdmin');

Route::resource('organization', OrganizationController::class)->middleware('can:isSAdmin');

Route::get('/organization/disable/{id}', 'App\Http\Controllers\OrganizationController@disable')->middleware('can:isSAdmin');


//========================== ADMIN ====================================
Route::get('/operator', 'App\Http\Controllers\UserController@operator')->name('operator')->middleware('can:isAdmin');
Route::get('/create-operator', 'App\Http\Controllers\UserController@create_operator')->name('create-operator')->middleware('can:isAdmin');
Route::post('/store-operator', 'App\Http\Controllers\UserController@store_operator')->name('store-operator')->middleware('can:isAdmin');
Route::get('/edit-operator/{id}', 'App\Http\Controllers\UserController@edit_operator')->name('edit-operator')->middleware('can:isAdmin');
Route::put('/update-operator', 'App\Http\Controllers\UserController@update_operator')->name('update-operator')->middleware('can:isAdmin');
Route::get('/disable-operator/{id}', 'App\Http\Controllers\UserController@disable_operator')->name('disable-operator')->middleware('can:isAdmin');
Route::get('/user/reset-pass-operator/{id}', 'App\Http\Controllers\UserController@reset_pass_operator')->name('reset-pass-operator')->middleware('can:isAdmin');




//========================== OPERATOR =================================

