<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TestPackages\Controllers\MainController;
use TestPackages\hello;

Route::get('hello/{user}', function ($user) {
    $hello= new hello();
    dd($hello->user($user));
    // return view('welcome');
});


Route::middleware('web')->group(function () {
    Route::get('/register', [MainController::class, 'register'])->name('register');
    Route::post('/store',[MainController::class,'store'])->name('store');
    Route::get('/login', [MainController::class, 'login'])->name('login');
    Route::post('login/check',[MainController::class,'check'])->name('check');
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
   

    Route::get('welcome', function () {
        if (Auth::check()) {
            return view('register::welcome_user');
        } else {
            return redirect()->route('login')->with('fail', 'You are not logged in.');
        }
    })->name('welcome');
    
});