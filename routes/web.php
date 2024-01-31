<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
    return view('home');
});
// Todos
Route::middleware(['auth'])->group(function(){
    Route::prefix('todo')->group(function () {
        Route::get('/list', [TodoController::class, 'index'])->name("todo.list");
        Route::post('/list', [TodoController::class, 'search'])->name('todo.search');
        Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
        Route::get('/edit/{id}', [TodoController::class, 'edit']);
        Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
        Route::post('/update/{id}', [TodoController::class, 'update'])->name("put.update.todo");
        Route::get('/delete/{id}', [TodoController::class, 'destroy']);
        Route::delete('/delete/{id}', [TodoController::class, 'destroy']);
    });
});



// Users
Route::controller(UserController::class)->group(function() {
    Route::get('/register', 'create');
    Route::get('/user/edit/{id}', 'edit');
    Route::post('/user/update/{id}','update')->name('put.update.user');
    Route::post('/store', 'store')->name('store');
});


// Auth
Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'getLogin')->name('login');
    Route::post('/authenticate', 'authenticate');
    Route::get('/logout', 'logout');

    // Google Login
    Route::get('/login/google','redirectToGoogle')->name('login.google');
    Route::get('/login/google/callback', 'handleGoogleCallback');
});

