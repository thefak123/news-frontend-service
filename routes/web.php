<?php

use App\Http\Controllers\NewsController;
use App\Http\Middleware\CheckIfLoggedIn;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, "index"])->name("home");

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::get('/news/{id}', [NewsController::class, "getNewsById"])->name("PageDetail");
