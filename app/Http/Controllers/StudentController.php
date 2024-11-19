<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;

class StudentController extends Controller
{
    public function index()
    {
        // Obtener los cursos en los que el usuario autenticado está matriculado
        $enrollments = Enrollment::where('user_id', Auth::id())->with('course')->get();
        
        return view('students.index', compact('enrollments'));
    }
}
