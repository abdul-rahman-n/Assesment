<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;

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

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

    Route::get('addresses/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('addresses', [AddressController::class, 'store'])->name('address.store');
    Route::get('addresses/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('addresses/{id}', [AddressController::class, 'update'])->name('address.update');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');