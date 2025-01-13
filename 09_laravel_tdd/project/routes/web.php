<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);
});

Route::middleware([AdminOnly::class])->group(function () {
    Route::get('admin', function () {
        return view('adminWelcome');
    })->middleware(AdminOnly::class);

    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('admin/events', EventController::class)->middleware(AdminOnly::class);
    Route::resource('admin/notifications', NotificationController::class)->middleware(AdminOnly::class);
    Route::resource('admin/reports', ReportController::class)->middleware(AdminOnly::class);
});

require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);
