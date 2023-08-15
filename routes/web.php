<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/reserve', [HomeController::class, 'reserve'])->name('reserve');
Route::post('/postReserve', [HomeController::class, 'postReserve'])->name('postReserve');
Route::get('/transaction', [HomeController::class, 'transaction'])->name('transaction');
Route::post('/postInvoice', [HomeController::class, 'postInvoice'])->name('postInvoice');
Route::get('/reserve-complete', [HomeController::class, 'reserveComplete'])->name('reserveComplete');
Route::get('/my-reservations', [HomeController::class, 'getList'])->name('myReservations');
Route::post('/cancelReservation/{id}', [HomeController::class, 'cancelReservation'])->name('cancelReservation');
Route::get('/reschedule/{id}', [HomeController::class, 'reschedule'])->name('reschedule');
Route::post('/rescheduleRes/{id}', [HomeController::class, 'rescheduleRes'])->name('rescheduleRes');

//User Management
Route::middleware('isAdmin')->group(function () {
    Route::get('/usermanage', [DashboardController::class, 'usermanage'])->name('usermanage');
    Route::post('/addUser', [DashboardController::class, 'addUser'])->name('addUser');
    Route::get('/deleteUser/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');
});

// Calendar
Route::middleware('isAdmin')->group(function () {
    Route::get('/calendar', [DashboardController::class, 'calendar'])->name('calendar');
});


Route::get('/check-reservation', [APIController::class, 'checkReservation'])->name('check-reservation');

//API For confirmation
Route::get('/confirmation', [APIController::class, 'confirmStatus'])->name('ConfirmStatus');
Route::get('/cancelation', [APIController::class, 'cancelStatus'])->name('CancelStatus');
Route::get('/reservation', [APIController::class, 'getReserveData'])->name('getReserveData');
Route::get('/get-user-data', [APIController::class, 'getUserData'])->name('getUserData');


// Customer Report
Route::middleware('isAdmin')->group(function () {
    Route::get('/report', [DashboardController::class, 'report'])->name('report');
    Route::get('/reportgraph', [DashboardController::class, 'reportgraph'])->name('reportgraph');
});

// Registration Edit form
Route::middleware('isAdmin')->group(function () {
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

//Chat
Route::middleware('auth')->group(function () {
    Route::post('/admin/chat', [DashboardController::class, 'chatstore'])->name('chat.store');
    Route::get('/admin/chat', [DashboardController::class, 'getChat'])->name('getChat');
    Route::post('/user/chat', [HomeController::class, 'chatcStore'])->name('chat.cstore');
    Route::get('/user/chat', [HomeController::class, 'getUserChat'])->name('getUserChat');
});




require __DIR__ . '/auth.php';
