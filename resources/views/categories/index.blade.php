@extends('layouts.app')
@section('content')

    
@if(Auth::check())
    <a class="btn btn-primary btn-sm" href="{{route('categories.create')}}" role="button">Crear</a>
@endif
<ul class="list-group list-group-flush" style="margin: 2%;">
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($categories as $category)
    {{-- visualizamos los atributos del objeto --}}
    <li>
        <a href="{{route('categories.show', $category)}}">{{$category->name}}</a>.
        Escrito el {{$category->created_at}}
        <h5>Incidencias</h5>
        
        @if($category->incidencies()->exists())
            @for ($i = 0; $i < 5; $i++)
                <ul>
                    @if(isset($category->incidencies[$i]))
                        <li>
                            <p>{{$category->incidencies[$i]->title}}</p>
                        </li>
                    @endif
                </ul>
            @endfor
        @endif
    </li>

    @if(Auth::check())
    <div style="display: flex;">
    <a class="btn btn-warning btn-sm" href="{{route('categories.edit',$category)}}" role="button">Editar</a>
    
    
    <form action="{{route('categories.destroy',$category)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
        </button>
    </form>
    </div>
    @endif

    @endforeach
</ul>
@endsection