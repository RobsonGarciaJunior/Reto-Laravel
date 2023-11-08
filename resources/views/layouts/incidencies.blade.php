<div class = "container">
    @if(Route::currentRouteName() == 'home')
    <h1>Mis Incidencias</h1>
    @else
    <h1>Incidencias</h1>
    @endif
    @if(Auth::check())
    <div class="btn-toolbar" style="display: flex; justify-content: space-between;" data-toggle="buttons">    
        <a class="btn btn-primary btn-sm" href="{{route('incidencies.create')}}" role="button">Crear</a>
        <a class="btn btn-primary btn-sm" href="{{route('home')}}" role="button">Mis incidencias</a>
    </div>
    @endif
    <!-- <ul class="list-group"> -->
    {{--esto es un comentario: recorremos el listado de incidencias--}}
    @foreach ($incidencies as $incidency)
        {{-- visualizamos los atributos del objeto --}}
        <!-- <li class="list-group-item"> -->
            <div class="container mb-5">
            <h3 class = "list-group-item-heading"><a href="{{route('incidencies.show', $incidency)}}">{{$incidency->title}}</a>
            @if(Auth::check())
                    @if(Auth::user()->id == $incidency->user->id)
                        <div class="btn-toolbar" style="display: flex; justify-content: space-evenly;" data-toggle="buttons">    
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
        
            </h3>
                
                <table class="table table-striped">
                    <thead>
                        <th>
                            Categoria
                        </th>
                        <th>
                            Departamento
                        </th>
                        <th>
                            Usuario
                        </th>
                        <th>
                            Tiempo
                        </th>
                        <th>
                            Prioridad
                        </th>
                        <th>
                            Estado
                        </th>
                    </thead>
                    <tbody>
                        <td>             
                            @if($incidency->category == null)
                                CATEGORIA --
                            @else
                                {{$incidency->category->name}}
                            @endif
                        </td>
                        <td>
                            {{$incidency->department->name}}
                        </td>
                        <td>                           
                           {{$incidency->user->name}}
                        </td>
                        <td>                           
                            {{$incidency->estimatedTime}} horas
                        </td>
                        <td>
                        @if($incidency->priority == null)
                            PRIORIDAD --
                        @else
                            {{$incidency->priority->name}}
                        @endif
                        </td>
                        <td>
                        @if($incidency->state == null)
                            ESTADO --
                        @else
                            {{$incidency->state->name}}
                        @endif
                        </td>
                    </tbody>
                </table>
                <p style="text-align: end;">Escrito el {{$incidency->created_at}}</p>
                
            </div>
        <!-- </li> -->
    @endforeach
<!-- </ul> -->
</div>