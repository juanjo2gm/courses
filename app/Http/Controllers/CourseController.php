<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourseController;


class CourseController extends Controller
{
    // Mostrar todos los cursos del usuario autenticado
    public function index()
    {
        $courses = Course::where('user_id', Auth::id())->get(); 
        return view('courses.index', compact('courses'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        return view('courses.create');
    }

    // Almacenar un nuevo curso
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Crear el curso asociado al usuario autenticado
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('courses.index');
    }

    // Mostrar un curso específico y cuantos alumnos estan matriculados
    public function show($id)
    {
        $course = Course::with('enrollments')->findOrFail($id); 
        $studentCount = $course->enrollments()->count();
        return view('courses.show', compact('course', 'studentCount'));
        
    }

    // Mostrar el formulario para editar un curso
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    // Actualizar un curso existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    // Eliminar un curso
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index');
    }

    //  NO FUNCIONA !!! Mostrar todos los cursos disponibles 
    public function availableCourses()
    {
        $courses = Course::all(); 
        return view('courses.available', compact('courses'));
    }
}
