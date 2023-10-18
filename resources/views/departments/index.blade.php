@extends('layouts.app')
@section('content')
<ul>
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($departments as $department)
    {{-- visualizamos los atributos del objeto --}}
    <li>
        <a href="{{route('departments.show', $department)}}">{{$department->name}}</a>.
        Escrito el {{$department->created_at}}
    </li>
    @endforeach
</ul>
@endsection