@extends('layouts.app')

@section('content')
    <h1>Panel del Alumno</h1>
    <a href="{{ route('courses.available') }}" class="btn btn-info">Ver cursos disponibles</a>
    <a href="{{ route('enrollments.index') }}" class="btn btn-info">Ver matrículas</a>

    <h2>Mis Cursos</h2>
    <ul class="list-group mt-3">
        @forelse ($enrollments as $enrollment)
            <li class="list-group-item">
                {{ $enrollment->course->title }}
            </li>
        @empty
            <li class="list-group-item">No estás matriculado en ningún curso.</li>
        @endforelse
    </ul>
@endsection