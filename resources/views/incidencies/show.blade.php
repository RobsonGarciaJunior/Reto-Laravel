@extends('layouts.app')
@section('content')
<h2>{{$incidency->title}}</h2>
<p>{{$incidency->text}}</p>


<h6>COMENTARIOS</h6>

    @if(Auth::check())
        @if(count($comments) > 0)
            <ul class="list-group list-group-flush" style="margin: 2%;">
                {{--esto es un comentario: recorremos el listado de departamentos--}}
                @foreach ($comments as $comment)
                    {{-- visualizamos los atributos del objeto --}}
                    <li>
                        <a href="{{route('comments.show', $comment)}}">{{$comment->id}}</a>.
                        <p>{{$comment->text}}</p>
                        Escrito el {{$comment->created_at}}
                        <p>Por el {{$comment->user->name}}</p>
                    </li>
                    
                        @if(Auth::user()->id == $comment->user->id)
                        <div style="display: flex;">
                            <a class="btn btn-warning btn-sm" href="{{route('comments.edit',$comment)}}" role="button">Editar</a>

                            <form action="{{route('comments.destroy',$comment)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </div>
                        @endif
                
                @endforeach
        @else
            <p>Aún no hay comentarios!</p>
        @endif
    @else
        <p>Necesitas estar logueado para ver lo comentarios!</p>
    @endif
    @if(Auth::check())
        @if(Auth::user()->departmentId == $incidency->departmentId)
        <a class="btn btn-primary btn-sm" href="{{route('categories.create')}}" role="button">Comentar</a>
        @endif
    @endif
@endsection