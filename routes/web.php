<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



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
/*------------------------------------------
--------------------------------------------
All User Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-role:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Staff Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-role:staff'])->group(function () {
    Route::get('staff', [App\Http\Controllers\HomeController::class, 'staff'])->name('staff.home');
    Route::get('/home/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('post.edit');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});


/*------------------------------------------
--------------------------------------------
All Owner Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-role:owner'])->group(function () {
    Route::get('owner', [App\Http\Controllers\HomeController::class, 'owner'])->name('owner.home');
});

/*------------------------------------------
--------------------------------------------
All guest Routes List
--------------------------------------------
--------------------------------------------*/
