<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware' => []], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login');
        Route::get('/logout', 'logout');
    });
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
    Route::controller(BukuController::class)->group(function(){
        Route::get('/baca-buku', 'index');
        Route::get('/load-more/books/{skip}', 'loadMoreBooks');
        Route::post('/books/search', 'searchBooks');
    });
});


// Dashboard
Route::controller(DashboardController::class)->group(function () {
    Route::middleware(['auth', 'checkLevel:Administrator'])->group(function () {
        Route::prefix('admin')->group(function(){
            Route::controller(DashboardController::class)->group(function () {
                Route::get('/home', 'adminIndex')->name('homeAdmin');
            });
        });
    });

    Route::middleware(['auth', 'checkLevel:Petugas'])->group(function () {
        Route::prefix('petugas')->group(function () {
            Route::get('/home', 'petugasIndex')->name('homePetugas');
        });
    });

    Route::middleware(['auth', 'checkLevel:Peminjam'])->group(function () {
        Route::prefix('peminjam')->group(function () {
            Route::get('/home', 'peminjamIndex')->name('homePeminjam');
        });
    });




});
