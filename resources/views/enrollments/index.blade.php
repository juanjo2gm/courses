@extends('layouts.app')


@section('content')
    <h1>Cursos Matriculados</h1>
    <ul class="list-group mt-3">
        @foreach ($enrollments as $enrollment)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('courses.show', $enrollment->course->id) }}">{{ $enrollment->course->title }}</a>
                <form action="{{ route('enrollments.destroy', $enrollment->course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Darse de baja</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
