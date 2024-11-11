@extends('layouts.app')

@section('content')
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Crear nuevo curso</a>
    <a href="{{ route('enrollments.index') }}" class="btn btn-info">Ver cursos matriculados</a>
    <a href="{{ route('courses.available') }}" class="btn btn-info mb-0">Ver cursos disponibles</a>
    <h1>Cursos que imparto</h1>
    <ul class="list-group mt-3"></ul>
        @foreach ($courses as $course)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
                <div>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
