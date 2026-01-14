<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/', function () {
    return redirect()->route('contact');
});

Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

Route::post('/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/search', [AdminController::class, 'search'])->name('admin.search');
    Route::get('/reset', [AdminController::class, 'reset'])->name('admin.reset');
    Route::delete('/delete', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/export', [AdminController::class, 'export'])->name('admin.export');
});