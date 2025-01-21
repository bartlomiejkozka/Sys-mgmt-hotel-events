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
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Trasa do wydarzeń, widok listy wydarzeń
Route::get('/events', [UserController::class, 'events'])->name('events.index');

// Trasa formularza rejestracji na wydarzenie
Route::get('/form', [UserController::class, 'form'])->name('form'); // Używamy UserController do pobrania wydarzeń

Route::post('/reservations', [UserController::class, 'register'])->name('reservations.store');


// Trasa do zapisania rezerwacji na wydarzenie
Route::post('/form', [UserController::class, 'register'])->name('reservations.store');

// Trasa do wyświetlania zapisanych wydarzeń
Route::get('/myevents', [UserController::class, 'myEvents'])->name('myevents');

// Trasa do powiadomień
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

// Trasa do opinii (jeśli masz jakąś logikę na ten temat)
Route::get('/opinionsq', [UserController::class, 'opinions'])->name('opinions.index');

// Trasa do dashboardu użytkownika
Route::get('/home', function () {
    return view('home');
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
    Route::resource('admin', AdminController::class);

    Route::get('admin/profile', [ProfileController::class, 'edit']);
    Route::patch('admin/profile/update', [ProfileController::class, 'update']);

    Route::resource('admin/events', EventController::class);

    Route::resource('admin/notifications', NotificationController::class);

    Route::resource('admin/reports', ReportController::class);
});

require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);
