<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EmployeeController::class,'index'])->name('employees');
Route::post('/', [EmployeeController::class,'store'])->name('employee.store');

Route::get('/trainings', [TrainingController::class,'index'])->name('trainings');
Route::post('/trainings', [TrainingController::class,'store'])->name('training.store');
