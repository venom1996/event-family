<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AffairsFamily;
use http\Client\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OverdueController;


Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    Route::post('/addAffairs', [AffairsFamily::class, 'add']);
    Route::post('/getAffairs', [AffairsFamily::class, 'get']);
    Route::post('/editAffairs', [AffairsFamily::class, 'edit']);
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');




Route::get('/overdue', function () {
    return view('overdue');
})->middleware(['auth', 'verified'])->name('overdue');

Route::get('/overdue', [OverdueController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('overdue');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
