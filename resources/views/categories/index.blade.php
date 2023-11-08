@extends('layouts.app')
@section('content')


<div class = "container">
    <h1>Categorias</h1>
    @if(Auth::check())
    <a class="btn btn-primary btn-sm" href="{{route('categories.create')}}" role="button">Crear</a>
    @endif
    <ul class="list-group">
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($categories as $category)
    {{-- visualizamos los atributos del objeto --}}
    <li class="list-group-item">
        <h3 class = "list-group-item-heading"><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></h3>
        <p>Escrito el {{$category->created_at}}</p>
        
        @if($category->incidencies()->exists())
        @include('layouts.incidencyList')
        @endif
        @if(Auth::check())
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <a class="btn btn-secondary btn-sm" href="{{route('categories.edit',$category)}}" role="button">Editar</a>
                
                
                <form action="{{route('categories.destroy',$category)}}" method="POST" enctype="multipart/form-data">
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