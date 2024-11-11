@extends('layouts.app')

@section('content')
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p><strong>Número de estudiantes matriculados:</strong> {{ $studentCount }}</p>

    <div class="mt-3">
        <form action="{{ route('enrollments.store') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button type="submit" class="btn btn-success mb-2">Matricularse en este curso</button>
        </form>

        <a href="{{ route('courses.index') }}" class="btn btn-secondary mb-2 ml-2">Volver a la lista</a>
    </div>
@endsection
