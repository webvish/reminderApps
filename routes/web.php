<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('admin/account.login');
});

// Auth::routes();

Route::get('/login', [LoginController::class, 'loginRequest'])->name('login');
Route::post('/can-login', [LoginController::class, 'canLogin'])->name('can-login');

Route::get('/register-view', [LoginController::class, 'register'])->name('register-view');
Route::post('/register', [LoginController::class, 'storeRegister'])->name('register');

Route::get('/logout', function(){ return view('admin/account.login'); })->name('logout');

    Route::group(array('middleware' => 'auth', 'prefix' => 'admin'), function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    /***** START User Routes *****/
    Route::get('/user', [UserController::class, 'index'])->name('index');
    Route::get('/user-listing', [UserController::class, 'getUsers'])->name('user-listing');
    /***** END User Routes *****/

    /***** START Posts Routes *****/
    Route::get('/post', [PostController::class, 'index'])->name('index');
    Route::get('/post-listing', [PostController::class, 'getPosts'])->name('post-listing');
    Route::get('/post/addPostData', [PostController::class, 'addPostData'])->name('addPostData');
    Route::post('insertPost', [PostController::class, 'insertPost'])->name('insertPost');
    Route::get('/post/{id}/editPost/', [PostController::class, 'editPostData'])->name('editPostData');
    Route::post('updatePost/{id}', [PostController::class, 'updatePost'])->name('updatePost');
    Route::get('deleteRowPost/{id}', [PostController::class, 'deleteRowPost'])->name('deleteRowPost');
    /***** END Posts Routes *****/
});
