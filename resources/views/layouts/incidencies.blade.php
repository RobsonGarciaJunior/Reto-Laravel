<div class = "container">
    <h1>Incidencias</h1>
    @if(Auth::check())
        <a class="btn btn-primary btn-sm" href="{{route('incidencies.create')}}" role="button">Crear</a>
    @endif
    <ul class="list-group">
    {{--esto es un comentario: recorremos el listado de incidencias--}}
    @foreach ($incidencies as $incidency)
        {{-- visualizamos los atributos del objeto --}}
        <li class="list-group-item">
            <h3 class = "list-group-item-heading"><a href="{{route('incidencies.show', $incidency)}}">{{$incidency->title}}</a></h3>
            @if($incidency->category == null)
            CATEGORIA --
            @else
            CATEGORIA {{$incidency->category->name}}
            @endif
            <p>{{$incidency->department->name}}</p>
            <p>Usuario: {{$incidency->user->name}}</p>

            <p>{{$incidency->text}}</p>
            <p>Tiempo estimado {{$incidency->estimatedTime}} horas</p>
            Escrito el {{$incidency->created_at}}
            @if(Auth::check())
                @if(Auth::user()->id == $incidency->user->id)
                    <div>
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
        </li>
    @endforeach
</ul>
</div>