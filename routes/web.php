<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/loan-details', [LoanController::class, 'index'])->name('loan.index');
    Route::get('/process-emi-index', [ProcessEmiController::class, 'showEmiDetails'])->name('process.emi.index');
    Route::post('/process-emi', [ProcessEmiController::class, 'processEmi'])->name('process.emi');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
