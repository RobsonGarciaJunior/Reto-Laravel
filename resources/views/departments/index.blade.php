@extends('layouts.app')
@section('content')

@if(Auth::check())
    <a class="btn btn-primary btn-sm" href="{{route('departments.create')}}" role="button">Crear</a>
@endif
    
<ul class="list-group list-group-flush" style="margin: 2%;">
    {{--esto es un comentario: recorremos el listado de departamentos--}}
    @foreach ($departments as $department)
    {{-- visualizamos los atributos del objeto --}}
    <li>
        <a href="{{route('departments.show', $department)}}">{{$department->name}}</a>.
        Escrito el {{$department->created_at}}
        <h5>Incidencias</h5>
        
        @if($department->incidencies()->exists())
            @for ($i = 0; $i < 5; $i++)
                <ul>
                    @if(isset($department->incidencies[$i]))
                        <li>
                            <p>{{$department->incidencies[$i]->title}}</p>
                        </li>
                    @endif
                </ul>
            @endfor
        @endif
    </li>

        @if(Auth::check())
        <div style="display: flex;">
        <a class="btn btn-warning btn-sm" href="{{route('departments.edit',$department)}}" role="button">Editar</a>
        
        
        <form action="{{route('departments.destroy',$department)}}" method="POST" enctype="multipart/form-data">
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