<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\SpecialtyController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\Api\HorarioController as ApiHorarioController;
use App\Http\Controllers\Api\SpecialtyController as ApiSpecialtyController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Doctor\HorarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    //RUTAS ESPECIALIDADES
    Route::get('/especialidades', [SpecialtyController::class, 'index'])->name('especialidades.index');

    Route::get('/especialidades/create', [SpecialtyController::class, 'create'])->name('especialidades.create');
    Route::get('/especialidades/{specialty}/edit', [SpecialtyController::class, 'edit'])->name('especialidades.edit');
    Route::post('/especialidades', [SpecialtyController::class, 'sendData'])->name('especialidades.sendData');

    Route::put('/especialidades/{specialty}', [SpecialtyController::class, 'update'])->name('especialidades.update');
    Route::delete('/especialidades/{specialty}', [SpecialtyController::class, 'destroy'])->name('especialidades.destroy');

    //RUTAS MEDICOS
    Route::resource('medicos', DoctorController::class);

    //RUTAS MEDICOS
    Route::resource('pacientes', PatientController::class);
});

Route::middleware(['auth', 'doctor'])->group(function () {
    Route::get('/horario', [HorarioController::class, 'edit'])->name('horario.edit');
    Route::post('/horario', [HorarioController::class, 'store'])->name('horario.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/reservarcitas/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/miscitas', [AppointmentController::class, 'store'])->name('appointment.store');

    //JSON
    Route::get('/especialidades/{specialty}/medicos', [ApiSpecialtyController::class, 'doctors']);
    Route::get('/horario/horas', [ApiHorarioController::class, 'hours']);
});
