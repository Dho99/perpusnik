<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
    });
});

// Route::middleware(['auth', 'checkLevel:Petugas'])->group(function () {
//     Route::prefix('petugas')->group(function(){
//         Route::controller(HomeController::class)->group(function () {
//             Route::get('/home', 'index')->name('home');
//         });
//     });
// });
