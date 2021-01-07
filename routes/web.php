<?php

use Illuminate\Support\Facades\Route;
//for crud
use App\Http\Controllers\ProductController;
//for validation
use App\Http\Controllers\HomeController;
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
//for crud
Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

//for validation user/email/pass
Route::get('user/create', [ HomeController::class, 'create' ]);
Route::post('user/create', [ HomeController::class, 'store' ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
