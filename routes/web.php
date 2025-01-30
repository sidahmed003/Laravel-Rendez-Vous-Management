<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;



Route::get('/', function () {
    return view('welcome');
});

Route::controller(AppointmentController::class)->group(function () {
    Route::get('/appointment', 'showForm')->name('appointment.form');
    Route::post('/appointment', 'store')->name('appointment.store');
});