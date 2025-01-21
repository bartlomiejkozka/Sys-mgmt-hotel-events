<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/myevents', function () {
    return view('myevents');
});

Route::get('/notifications', function () {
    return view('notifications');
});

Route::get('/opinions', function () {
    return view('opinions');
});


// testowy route
Route::get('/test1', function () {
    return view('listaWydarzen');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);
});

//=====================ADMIN ROUTES==============================

Route::middleware([AdminOnly::class])->group(function () {
    Route::get('admin', [AdminController::class, 'index']);

    Route::get('admin/profile', [ProfileController::class, 'edit']);
   // Route::patch('admin/profile/update', [ProfileController::class, 'update']);

    Route::resource('admin/events', EventController::class);

    Route::resource('admin/notifications', NotificationController::class);

    Route::resource('admin/reports', ReportController::class);
});

//================================================================

require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);
