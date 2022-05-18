<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MetadataController;

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


Route::get('/', [HomeController::class, 'index'])->name('main');
Route::resource('users', UserController::class);
Route::resource('metadata', MetadataController::class);

Route::get('users/hire/{boss}/{employee}', [UserController::class, 'hire'])->name('users.hire');

Route::get('users/unhire/{boss}/{employee}', [UserController::class, 'unhire'])->name('users.unhire');
