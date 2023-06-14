<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

//archive
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/aboutus', function(){
//     return view('aboutus');
// })->middleware(['auth', 'verified'])->name('aboutus');

//TEST AREA
Route::get('/testarea', [DashboardController::class, 'testarea']);
//TEST AREA END

//Home
    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
    Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
    Route::get('/reserve', [HomeController::class, 'reserve'])->name('reserve');
    Route::post('/postReserve', [HomeController::class, 'postReserve'])->name('postReserve');
    Route::get('/reserve-complete', [HomeController::class, 'reserveComplete'])->name('reserveComplete');
//List need for client customers / guest
// Register / Reserve Page

// About Us


//

// List need for client user:
// Dashboard (calendar &stats)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/usermanage', [DashboardController::class, 'usermanage'])->name('usermanage');
    Route::post('/addUser', [DashboardController::class, 'addUser'])->name('addUser');
    Route::get('/deleteUser/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');
});

Route::middleware('auth')->group(function () {
    Route::get('/calendar', [DashboardController::class, 'calendar'])->name('calendar');

});

//API For confirmation
Route::get('/confirmation/{id}', [APIController::class, 'confirmStatus'])->name('ConfirmStatus');
Route::get('/cancelation/{id}', [APIController::class, 'cancelStatus'])->name('CancelStatus');
Route::get('/reservation/{id}', [APIController::class, 'getReserveData'])->name('getReserveData');

// Customer Report
Route::middleware('auth')->group(function () {
    Route::get('/report', [DashboardController::class, 'report'])->name('report');
});

// Registration Edit form
Route::middleware('auth')->group(function () {
    Route::get('/edit', [DashboardController::class, 'edit'])->name('edit');
    Route::post('/editUpdate', [DashboardController::class, 'editUpdate'])->name('editUpdate');
    Route::post('/addField', [DashboardController::class, 'addField'])->name('addField');
    Route::get('/deleteField/{id}', [DashboardController::class, 'deleteField'])->name('deleteField');
});


//Profile edit
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
