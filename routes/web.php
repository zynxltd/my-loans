<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanApplicationController;

Route::get('/', function () {
    return view('index');
});

Route::get('/apply', [LoanApplicationController::class, 'show'])->name('loan.apply');
Route::post('/apply', [LoanApplicationController::class, 'submit'])->name('loan.submit');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/privacy', function () {
    return view('privacy');
});