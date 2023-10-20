@extends('layouts.app')
@section('content')

    <a class="btn btn-primary btn-sm" href="{{route('departments.create')}}" role="button">Crear</a>

<ul class="list-group list-group-flush" style="margin: 2%;">
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($departments as $department)
    {{-- visualizamos los atributos del objeto --}}
    <li>
        <a href="{{route('departments.edit', $department)}}">{{$department->name}}</a>.
        Escrito el {{$department->created_at}}
    </li>

   
    <div style="display: flex;">
    <a class="btn btn-warning btn-sm" href="{{route('departments.edit',$department)}}" role="button">Editar</a>
    
    
    <form action="{{route('departments.destroy',$department)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
        </button>
    </form>
    </div>
    @endforeach
</ul>
@endsection