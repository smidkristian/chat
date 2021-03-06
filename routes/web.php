<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// Chat

Route::middleware(['auth:sanctum', 'verified'])->get('/chat', function () {
    return Inertia::render('Chat/container');
})->name('chat');

Route::middleware(['auth:sanctum', 'verified'])->get('/chat/rooms', [ChatController::class , 'rooms'])->name('rooms');
Route::middleware(['auth:sanctum', 'verified'])->get('/chat/room/{roomId}/messages', [ChatController::class , 'messages'])->name('messages');
Route::middleware(['auth:sanctum', 'verified'])->post('/chat/room/{roomId}/message', [ChatController::class , 'newMessage'])->name('newMessage');

// VideoChat

Route::middleware(['auth:sanctum', 'verified'])->get('/video_chat', [VideoChatController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->post('/auth/video_chat', [VideoChatController::class, 'auth']);
