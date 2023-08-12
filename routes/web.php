<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;

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

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/artikel/{slug}', [FrontController::class, 'single_article'])->name('single_article');

Route::middleware('auth')->group(function () {
    Route::resource('admin', ArtikelController::class, ['as' => 'article']);
});
Route::middleware('guest')->group(function () {
    Route::get('login', [UserController::class, 'login_view'])->name(('login_view'));
    Route::post('login', [UserController::class, 'login_post'])->name(('login_post'));
});
Route::get('logout', [UserController::class, 'logout_view'])->name(('logout_view'));
