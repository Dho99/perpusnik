<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KoleksiPribadiController;

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
    Route::prefix('books')->group(function(){
        Route::controller(BukuController::class)->group(function(){
            Route::get('/', 'index');
            Route::get('/read/{slug}', 'show');
            Route::get('/load-more/{skip}', 'loadMoreBooks');
            Route::post('/search', 'searchBooks');
            Route::get('/search', function(){
                return response()->view('errors.404');
            });
        });
        Route::prefix('category')->group(function(){
            Route::controller(KategoriController::class)->group(function(){
                Route::get('/{category}', 'index');
                Route::get('/load-more/{category}/{skip}', 'loadMoreBooks');
            });
        });
    });
});


// Dashboard
Route::controller(DashboardController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::middleware('checkLevel:Administrator')->group(function () {
            Route::prefix('admin')->group(function(){
                Route::controller(DashboardController::class)->group(function () {
                    Route::get('/home', 'adminIndex')->name('homeAdmin');
                });
            });
        });

        Route::middleware('checkLevel:Petugas')->group(function () {
            Route::prefix('petugas')->group(function () {
                Route::get('/home', 'petugasIndex')->name('homePetugas');
            });
        });

        Route::middleware('checkLevel:Peminjam')->group(function () {
            Route::prefix('peminjam')->group(function () {
                Route::get('/home', 'peminjamIndex')->name('homePeminjam');
            });
        });


        Route::prefix('books/collections')->group(function(){
            Route::controller(KoleksiPribadiController::class)->group(function(){
                Route::post('/add/{slug}', 'collect');
                Route::get('/', 'collections');
                Route::post('/search', 'searchCollectedBooks');
                Route::get('/remove/{slug}', 'removeCollectedBooks');
            });
        });
    });


});
