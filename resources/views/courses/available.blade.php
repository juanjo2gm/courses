@extends('layouts.app')

<!-- NO FUNCIONA-->

@section('content')
    <h1>Cursos Disponibles</h1>
    <ul class="list-group mt-3">
        @foreach ($courses as $course)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a>
                <form action="{{ route('enrollments.store') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit" class="btn btn-success btn-sm">Matricularse</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
