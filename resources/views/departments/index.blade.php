@extends('layouts.app')
@section('content')

<div class = "container">
    <h1>Departamentos</h1>
    @if(Auth::check())
        <a class="btn btn-primary btn-sm" href="{{route('departments.create')}}" role="button">Crear</a>
    @endif
    <ul class="list-group">
        {{--esto es un comentario: recorremos el listado de departamentos--}}
        @foreach ($departments as $department)
        {{-- visualizamos los atributos del objeto --}}
        <li class="list-group-item">
            <h3 class = "list-group-item-heading"><a href="{{route('departments.show', $department)}}">{{$department->name}}</a></h3>
            <p>Escrito el {{$department->created_at}}</p>
            @if($department->incidencies()->exists())
            @include('layouts.incidencyList')
            @endif
            @if(Auth::check())
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a class="btn btn-secondary btn-sm" href="{{route('departments.edit',$department)}}" role="button">Editar</a>

                @if(!$department->incidencies()->exists())
                <form action="{{route('departments.destroy',$department)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                    </button>
                </form>
                </div>
                @endif
            @endif
        </li>    
        @endforeach
    </ul>
</div>
@endsection