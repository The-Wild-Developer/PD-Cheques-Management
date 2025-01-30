<?php

use Illuminate\Support\Facades\Route;


// Auth Routes
Route::get('/', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::get('/forgot-password', function () { return view('auth.forgot-password'); })->name('forgot.password');

// Main Routes
Route::get('/dashboard', function () { return view('pages.dashboard'); });
Route::get('/profile', function () { return view('pages.profile'); });


Route::get('/cheque', function () { return view('pages.cheques/cheque'); });
Route::get('/cheque-list', function () { return view('pages.cheques/cheque-list'); });




