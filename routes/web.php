<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\VatCalculatorController;
use App\Http\Controllers\AdminDashboradController;
use App\Http\Controllers\Auth\DashboradController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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



Route::middleware('guest')->prefix('admin')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('store');    
    
    Route::get('/register', [RegisteredUserController::class,'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
  
});



Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class,'create'])->name('profile');
    Route::post('/profile/{id}', [ProfileController::class,'update'])->name('profile.update');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [AdminDashboradController::class,'index'])->name('dashboard');
    Route::get('/vat-calculator', [VatCalculatorController::class,'index'])->name('vat.calculator');
    Route::post('/vat-calculator', [VatCalculatorController::class,'store'])->name('vat.calculator.store');
});