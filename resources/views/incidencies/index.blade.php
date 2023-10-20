@extends('layouts.app')
@section('content')

<a class="btn btn-primary btn-sm" href="{{route('incidencies.create')}}" role="button">Crear</a>

<ul class="list-group list-group-flush" style="margin: 2%;">
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($incidencies as $incidency)
    {{-- visualizamos los atributos del objeto --}}
    <li>
        <h4><a href="{{route('incidencies.edit', $incidency)}}">{{$incidency->title}}</a></h4>
        {{$incidency->category->name}}
        <p>Usuario: {{$incidency->user->name}}</p>

        <p>{{$incidency->text}}</p>
        <p>Tiempo estimado {{$incidency->estimatedTime}}</p>
        Escrito el {{$incidency->created_at}}
    </li>
    @if(Auth::check())
    @if(Auth::user()->id == $incidency->user->id)
    <div style="display: flex;">
        <a class="btn btn-warning btn-sm" href="{{route('incidencies.edit',$incidency)}}" role="button">Editar</a>


        <form action="{{route('incidencies.destroy',$incidency)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
            </button>
        </form>
    </div>
    @endif
    @endif
    @endforeach
</ul>
@endsection