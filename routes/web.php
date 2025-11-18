<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Coba\Contoh1Ctrl;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contoh1', [Contoh1Ctrl::class, 'index']);
Route::resource('contoh2', Contoh1Ctrl::class);

Route::get('/contoh', function () {
    return view('rpl.contoh');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::middleware('auth')->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::post('/logout', 'logout')->name('logout');
});
