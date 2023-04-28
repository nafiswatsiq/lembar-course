<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ClassController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProgramingLangController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/class', [ClassController::class, 'index'])->name('class');
    Route::get('/class/{slug}', [ClassController::class, 'createSection'])->name('class.section');
    Route::get('/class/{slug}/{id}', [ClassController::class, 'createSection'])->name('class.section.create');
    Route::get('/programing-language', [ProgramingLangController::class, 'index'])->name('programing.lang');
    route::get('/user', [UserController::class, 'index'])->name('user');
});

Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', function () {
        return view('user.home');
    })->name('dashboard');
});