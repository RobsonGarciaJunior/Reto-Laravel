@extends('layouts.app')
@section('content')

    <a class="btn btn-primary btn-sm" href="{{route('comments.create')}}" role="button">Crear</a>

<ul class="list-group list-group-flush" style="margin: 2%;">
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($comments as $comment)
    {{-- visualizamos los atributos del objeto --}}
    <li>
        <a href="{{route('comments.show', $comment)}}">{{$comment->id}}</a>.
        <p>{{$comment->text}}</p>
        Escrito el {{$comment->created_at}}
    </li>

   
    <div style="display: flex;">
    <a class="btn btn-warning btn-sm" href="{{route('comments.edit',$comment)}}" role="button">Editar</a>
    
    
    <form action="{{route('comments.destroy',$comment)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Borrar
        </button>
    </form>
    </div>
    @endforeach
</ul>
@endsection