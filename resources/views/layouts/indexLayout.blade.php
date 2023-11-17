<div class = "container">
    <span style="padding: 1em; display: flex; justify-content: space-between;">
        <h1>{{$nombre}}</h1>
        @if(Auth::check())
        <div class="btn-toolbar" style="display: inline; justify-content: space-between;" data-toggle="buttons">
            <a class="btn btn-primary btn-sm" href="{{route($item_create_path)}}" role="button">Crear</a>
        </div>
        @endif
    </span>
    <div class="container mb-5" style="border: 1px peru;">
        @foreach ($items as $item)
            {{-- visualizamos los atributos del objeto --}}
            <div class="container mb-5 rounded-bottom" style="padding: 1em; border-bottom: 2px solid;">
                <span style="padding: 1em; display: flex; justify-content: space-between;">
                    <h3 class = "list-group-item-heading"><a class="link-offset-2 link-underline link-underline-opacity-0" href="{{route($item_show_path, $item)}}">{{$item->name}}</a></h3>
                    @if(Auth::check())
                    <div data-toggle="buttons">
                        <a class="btn btn-warning btn-sm" href="{{route($item_edit_path,$item)}}" role="button">Editar</a>
                        <!-- FIXME Aqui se repite un poco el codigo ya que tengo que comprobar si vengo de departamento, que no pueda borrar el departamento si existen incidenias relacionadas-->
                        @if(Route::currentRouteName() == 'departments.index')
                            @if(!$item->incidencies()->exists())
                            <!-- FIXME Deberia hacer una comprobacion OR en vez de separarlos en dos ifs pero no funciona bien-->
                                @if(!$item->users()->exists())
                                    <form action="{{route($item_destroy_path,$item)}}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @else
                            <form action="{{route($item_destroy_path,$item)}}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        @endif
                    </div>      
                    @endif  
                </span>
                <table class="table table-striped">
                    <thead  class="table-dark">
                        <th>
                            Incidencias
                        </th>
                    </thead>
                    <tbody class="table-group-divider">
                        <td>
                        @if($item->incidencies()->exists())
                            @include('layouts.incidencyList',['items'=> $item])
                        @endif
                        </td>
                    </tbody>
                </table>
                <p style="text-align: end;">Escrito el {{$item->created_at}}</p>   
            </div>               
        @endforeach
    </div>
</div>