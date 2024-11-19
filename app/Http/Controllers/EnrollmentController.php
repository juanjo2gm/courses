<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    // Mostrar todos los cursos en los que el usuario está matriculado
    public function index()
    {
        $enrollments = Enrollment::with('course')->where('user_id', Auth::id())->get();
        return view('enrollments.index', compact('enrollments'));
    }

    // Matricular al usuario en un curso
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        // Validar si el usuario ya está matriculado en el curso
        $existingEnrollment = Enrollment::where('user_id', Auth::id())
                                        ->where('course_id', $request->course_id)
                                        ->first();

        if ($existingEnrollment) {
            return redirect()->route('enrollments.index');
        }

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('students.index');
    }

    // Dar de baja al usuario de un curso
    public function destroy($id)
    {
        $enrollment = Enrollment::where('user_id', Auth::id())->where('course_id', $id)->firstOrFail();
        $enrollment->delete();

        return redirect()->route('enrollments.index');
    }
}
