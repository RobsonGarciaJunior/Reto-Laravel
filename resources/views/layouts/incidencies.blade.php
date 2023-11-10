<div class = "container">
    <span style="padding: 1em; display: flex; justify-content: space-between;">
        @if(Route::currentRouteName() == 'home')
        <h1>Mis Incidencias</h1>
        @else
        <h1>Incidencias</h1>
        @endif
        @if(Auth::check())
        <div class="btn-toolbar" style="display: inline; justify-content: space-between;" data-toggle="buttons">    
            <a class="btn btn-primary btn-sm" href="{{route('incidencies.create')}}" role="button">Crear</a>
            <a class="btn btn-primary btn-sm" href="{{route('home')}}" role="button">Mis incidencias</a>
        </div>
        @endif
    </span>
    <!-- <ul class="list-group"> -->
    {{--esto es un comentario: recorremos el listado de incidencias--}}
    <div class="container mb-5">
        @foreach ($incidencies as $incidency)
            {{-- visualizamos los atributos del objeto --}}
            <!-- <li class="list-group-item"> -->
                <div class="container mb-5 rounded-bottom" style="padding: 1em; border-bottom: 2px solid;">
                    <span style="padding: 1em; display: flex; justify-content: space-between;">
                    <h3 class = "list-group-item-heading"><a class="link-offset-2 link-underline link-underline-opacity-0" href="{{route('incidencies.show', $incidency)}}">{{$incidency->title}}</a></h3>
                    @if(Auth::check())
                            @if(Auth::user()->id == $incidency->user->id)
                                <div data-toggle="buttons">    
                                    <a class="btn btn-warning btn-sm" href="{{route('incidencies.edit',$incidency)}}" role="button">Editar</a>
                                
                                    <form action="{{route('incidencies.destroy',$incidency)}}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endif
                    </span>
                    <table class="table table-striped">
                        <thead  class="table-dark">
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
                        <tbody class="table-group-divider fixed">
                            <td>             
                                @if($incidency->category == null)
                                    Categoria --
                                @else
                                    <a href="{{route('categories.show',$incidency->category)}}">{{$incidency->category->name}}</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('departments.show',$incidency->department)}}"> {{$incidency->department->name}}</a>
                            </td>
                            <td>                           
                            {{$incidency->user->name}}
                            </td>
                            <td>                           
                                {{$incidency->estimatedTime}} horas
                            </td>
                            <td>
                            @if($incidency->priority == null)
                                Prioridad --
                            @else
                                <a href="{{route('priorities.show',$incidency->priority)}}">{{$incidency->priority->name}}</a>
                            @endif
                            </td>
                            <td> 
                            @if($incidency->state == null)
                                ESTADO --
                            @else
                                <a href="{{route('states.show',$incidency->state)}}">{{$incidency->state->name}}</a>
                                
                            @endif
                            </td>
                        </tbody>
                    </table>
                    <p style="text-align: end;">Escrito el {{$incidency->created_at}}</p>
                    
                </div>
            <!-- </li> -->
        @endforeach
    </div>
<!-- </ul> -->
</div>