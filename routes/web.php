<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PatientController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de citas
    Route::resource('appointments', AppointmentController::class);

    //Ruta para administrador
    Route::resource('users', UserController::class)->middleware('auth');

    // Rutas del calendario
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/appointments', [CalendarController::class, 'getAppointments'])->name('calendar.appointments');

    //Rutas para pacientes
    Route::prefix('patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('patients.index');
        Route::get('/{patient}', [PatientController::class, 'show'])->name('patients.show');
        Route::resource('patients', PatientController::class)->only(['index', 'show', 'edit', 'update']);
    });
});

require __DIR__.'/auth.php';
