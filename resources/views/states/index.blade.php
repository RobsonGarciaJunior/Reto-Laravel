@extends('layouts.app')
@section('content')

<div class = "container">
    <h1>Estados</h1>
    @if(Auth::check())
        <a class="btn btn-primary btn-sm" href="{{route('states.create')}}" role="button">Crear</a>
    @endif
    <ul class="list-group">
        {{--esto es un comentario: recorremos el listado de departamentos--}}
        @foreach ($states as $state)
        {{-- visualizamos los atributos del objeto --}}
        <li class="list-group-item">
            <h3 class = "list-group-item-heading"><a href="{{route('states.show', $state)}}">{{$state->name}}</a></h3>
            <p>Escrito el {{$state->created_at}}</p>
            @if($state->incidencies()->exists())
            <h5>Incidencias</h5>
                @for ($i = 0; $i < 5; $i++)
                    <ul>
                        @if(isset($state->incidencies[$i]))
                            <li>
                                <p>{{$state->incidencies[$i]->title}}</p>
                            </li>
                        @endif
                    </ul>
                @endfor
            @endif
            @if(Auth::check())
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a class="btn btn-secondary btn-sm" href="{{route('states.edit',$state)}}" role="button">Editar</a>

                <form action="{{route('states.destroy',$state)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                    </button>
                </form>
                </div>
            @endif
        </li>    
        @endforeach
    </ul>
</div>
@endsection