<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffairsFamilyController;
use http\Client\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OverdueController;


Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    Route::post('/addAffairs', [AffairsFamilyController::class, 'add']);
    Route::post('/getAffairs', [AffairsFamilyController::class, 'get']);
    Route::post('/editAffairs', [AffairsFamilyController::class, 'edit']);
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/overdue', [OverdueController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('overdue');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
