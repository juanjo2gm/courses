<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\RoleSelectionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StudentController;

// Rutas protegidas 
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('dashboard'); 
    Route::get('/role-selection', [RoleSelectionController::class, 'index'])->name('role.selection');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
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

     // Ruta para ver cursos disponibles
     Route::get('courses/list/available', [CourseController::class, 'availableCourses'])->name('courses.available');
});


Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/register', [AuthenticatedSessionController::class, 'storeRegister'])->name('register');

