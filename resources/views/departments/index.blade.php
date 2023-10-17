<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        {{--esto es un comentario: recorremos el listado de departamentos--}}
        @foreach ($departments as $department)
        {{-- visualizamos los atributos del objeto --}}
        <li>
            <a href="{{route('departments.show', $department)}}"> {{$department->name}}</a>.
            Escrito el {{$department->created_at}}
        </li>
        @endforeach
    </ul>
</body>

</html>