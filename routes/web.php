<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

// Rutas protegidas 
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('dashboard'); 
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index'); 
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

     // Rutas para matrículas
     Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
     Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
     Route::delete('enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');

     // NO FUNCIONA !!! Ruta para ver cursos disponibles
     Route::get('courses/list/available', [CourseController::class, 'availableCourses'])->name('courses.available');




});
