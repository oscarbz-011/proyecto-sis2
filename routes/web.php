<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RelativeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;


//Autenticacion
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::view('/register', 'auth.register')->name('register');
Route::post('/register',[RegisteredUserController::class, 'store']);
//Route::view('/home','home')->middleware('auth')->name('home');
Route::view('/', 'welcome');

//Pacientes
Route::resource('pacientes',PatientController::class)->middleware('auth');
Route::resource('permissions',PermissionController::class)->middleware('auth');
//Doctores
Route::resource('/doctores',DoctorController::class)->parameters('doctor')->middleware('auth');
//Turnos
Route::resource('/turnos',ConsultController::class)->middleware('auth');
//Medicamentos
Route::resource('medicamentos',MedicineController::class)->middleware('auth');
//Familiar-paciente
Route::resource('familiares',RelativeController::class)->middleware('auth');
Route::resource('perfil',PerfilController::class)->middleware('auth');
//Derivaciones
Route::resource('derivaciones',TransferController::class)->middleware('auth');
//Recetas
Route::resource('recetas', PrescriptionController::class)->middleware('auth');
//admin
Route::resource('admin', UserController::class)->middleware('auth');


