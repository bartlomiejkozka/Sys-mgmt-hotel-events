<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminOnly;

Route::get('/', function () {
    return view('welcome');
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

Route::get('admin', function () {
    return view('adminWelcome');
})->middleware(AdminOnly::class);

Route::resource('admin/event', App\Htp\Controllers\Admin\EventController::class)->middleware(AdminOnly::class);
Route::resource('admin/notification', App\Htp\Controllers\Admin\NotificationController::class)->middleware(AdminOnly::class);
Route::resource('admin/event/reports', App\Htp\Controllers\Admin\ReportController::class)->middleware(AdminOnly::class);


require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);
