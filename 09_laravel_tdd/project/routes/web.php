<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\EventControllerAdmin;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationControllerAdmin;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home'])->name('home')->middleware(['auth', 'verified']);

// Trasa do wydarzeń, widok listy wydarzeń
Route::get('/events', [EventController::class, 'events'])->name('events.index');

// Trasa formularza rejestracji na wydarzenie
Route::get('/form', [EventController::class, 'form'])->name('form'); // Używamy UserController do pobrania wydarzeń

Route::post('/reservations', [EventController::class, 'register'])->name('reservations.store');

Route::post('/opinions', [UserController::class, 'addReview'])->name('reviews.add');

// Trasa do zapisania rezerwacji na wydarzenie
Route::post('/form', [EventController::class, 'register'])->name('reservations.store');

// Trasa do wyświetlania zapisanych wydarzeń
Route::get('/myevents', [EventController::class, 'myEvents'])->name('myevents');

Route::delete('/reservation/{id}/cancel', [EventController::class, 'cancel'])->name('cancel.reservation');


// Trasa do powiadomień
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

// Trasa do opinii (jeśli masz jakąś logikę na ten temat)
Route::get('/opinions', [UserController::class, 'opinions'])->name('opinions');

// Trasy związane z profilem użytkownika
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);
});

//=====================ADMIN ROUTES==============================

Route::middleware([AdminOnly::class])->group(function () {
    Route::get('admin', [AdminController::class, 'index']);

    Route::get('/admin/profile', [ProfileController::class, 'edit']);

    Route::resource('/admin/events', EventControllerAdmin::class);

    Route::resource('admin/notifications', NotificationControllerAdmin::class);



    //Route::resource('admin/reservations', ReservationController::class);
    Route::delete('/reservations/{user}/{event}', [ReservationController::class, 'destroy'])
        ->name('reservations.destroy');

    Route::resource('admin/reports', ReportController::class);

});

//================================================================

require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);
