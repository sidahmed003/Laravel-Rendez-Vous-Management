<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;

Route::get('/appointment', [AppointmentController::class, 'showForm'])->name('appointment.form');
Route::post('/appointment', [AppointmentController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/appointment', [AppointmentController::class, 'showForm'])->name('appointment.form');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');