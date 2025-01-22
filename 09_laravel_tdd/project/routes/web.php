<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [UserController::class, 'home'])->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

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

// Trasa do dashboardu użytkownika
Route::get('/home', function () {
    return view('user.home');
})->middleware(['auth', 'verified'])->name('home');

// Trasy związane z profilem użytkownika
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class); // Trasy do książek
});

// Trasy admina
Route::middleware([AdminOnly::class])->group(function () {
    Route::get('admin', function () {
        return view('adminWelcome');
    });

    // Wydarzenia admina
    Route::resource('admin/events', EventController::class);

    // Powiadomienia admina
    Route::resource('admin/notifications', NotificationController::class);

    // Raporty admina
    Route::resource('admin/reports', ReportController::class);
});

// Trasa do komentowania (jeśli masz system komentarzy)
Route::resource('/comments', CommentController::class);

require __DIR__ . '/auth.php'; // Trasy związane z autentykacją
