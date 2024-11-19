<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Role Selection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .centered {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .btn-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container centered">
        <h1>¿Que eres?</h1>
        <div class="btn-group">
            <a href="{{ route('students.index') }}" class="btn btn-primary">Alumno</a>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Profesor</a>
        </div>
    </div>
</body>
</html>