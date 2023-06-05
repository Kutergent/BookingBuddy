<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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


//Home
Route::get('/', function () {
    return view('welcome');
});

//List need for client customers
// Register / Reserve Page

// About Us
Route::get('/aboutus', function(){
    return view('aboutus');
})->middleware(['auth', 'verified'])->name('aboutus');

//

// List need for client user:
// Dashboard (calendar &stats)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/calendar', [DashboardController::class, 'calendar'])->name('calendar');
});

// Customer Report
Route::middleware('auth')->group(function () {
    Route::get('/report', [DashboardController::class, 'report'])->name('report');
});

// Registration Edit form
Route::middleware('auth')->group(function () {
    Route::get('/edit', [DashboardController::class, 'edit'])->name('edit');
});

//Profile edit
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
