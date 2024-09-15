<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('public', function () {
    return view('public');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
    ->group(function () {
        Route::get('private', function () {

            $userOthers = User::query()
                ->where('id', '!=', auth()->id())
                ->pluck('name', 'id')
                ->all();

            return view('private', compact('userOthers'));
        });

        Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

        Route::get('chat/{roomId}/{receiverId}', function ($roomId, $receiverId) {
            return view('chat', compact('roomId', 'receiverId'));
        });

        Route::post('/messages/send', [MessageController::class, 'sendMessage']);
    });
