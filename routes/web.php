<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Dasboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

//halaman yang dapat diakses oleh guest
Route::get('/', [BerandaController::class, 'index']);
Auth::routes([
    // 'register' => false
]);

//landing page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//controller yang hanya bisa diakses oleh user yang terdftar
Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::resource('menu', MenuController::class);
    // Route::get('dashboard', [Dasboard::class, 'index']);
    Route::resource('dashboard', Dasboard::class);
});

// Route::resource('beranda', BerandaController::class);

//controller yang hanya bisa diakses oleh role owner
Route::middleware(['auth', 'owner'])->group(function () {
    Route::resource('user', UserController::class);
});