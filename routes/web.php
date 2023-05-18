<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [RegistrationController::class, 'register']);
Route::get('/', [RegistrationController::class, 'index']);

