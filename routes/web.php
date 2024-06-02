<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tech-index')->name("home");
});

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::get('/page/{id}', function (string $id) {
    return view('tech-single');
})->name("PageDetail");
