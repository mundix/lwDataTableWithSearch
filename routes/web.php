<?php

use App\Http\Controllers\PostList;
use App\Http\Controllers\ShowProfile;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\HomeController::class, 'index'])->name('posts');
Route::get('/profile', [App\Http\Controllers\ShowProfile::class])->name('profile-settings');
Route::get('/post-list', [App\Http\Controllers\PostList::class])->name('post-ist');
