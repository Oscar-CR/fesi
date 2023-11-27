<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AmbitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('index');

Route::get('/alumnos/calendario-de-examenes-extraordinario', [AlumnoController::class, 'index'])->name('alumno.index');
Route::get('/alumnos/calendario-de-examenes-extraordinario/curso/{id}', [AlumnoController::class, 'course'])->name('alumno.course');
Route::post('/alumnos/calendario-de-examenes-extraordinario/curso/descargar', [AlumnoController::class, 'download'])->name('alumno.course.download');


Route::middleware('auth')->group(function () {

    Route::post('/ambit/store', [AmbitController::class, 'store'])->name('ambit.store');
    Route::get('/ambit/detail/{id}', [AmbitController::class, 'ambitDetail'])->name('ambit.detail');
    Route::get('/ambit/detail/course/{id}', [AmbitController::class, 'ambitDetailCourse'])->name('ambit.detail.course');
    Route::post('/ambit/detail/course/{id}', [AmbitController::class, 'ambitUpdateCourse'])->name('ambit.update.course');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
