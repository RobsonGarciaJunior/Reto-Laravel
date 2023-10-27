@if(Auth::check())
        @if(count($comments) > 0)
        <div class = "container">
            <h3 style="text-align: center;">Comentarios</h3>
            <ul class="list-group">
                {{--esto es un comentario: recorremos el listado de departamentos--}}
                @foreach ($comments as $comment)
                    {{-- visualizamos los atributos del objeto --}}
                    <li class="list-group-item">
                        <h3 class = "list-group-item-heading">{{$comment->user->name}}</h3>
                        <!-- <a href="{{route('comments.show', $comment)}}"></a> -->
                        Escrito el {{$comment->created_at}}
                        <p>{{$comment->text}}</p>
                        <p>Tiempo usado: {{$comment->usedTime}}h</p>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @if(Auth::user()->id == $comment->user->id)                           
                                <a class="btn btn-warning btn-sm" href="{{route('comments.edit',$comment)}}" role="button">Editar</a>
                            @endif
                            @if(Auth::user()->id == $incidency->user->id)
                            <form action="{{route('comments.destroy',$comment)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        @else
            <div class="container">
                <h3>Aún no hay comentarios!</h3>
            </div>
        @endif
    @else
        <p>Necesitas estar logueado para ver lo comentarios!</p>
    @endif
    @if(Auth::check())
        @if(Auth::user()->departmentId == $incidency->departmentId)
            @include('comments.FormCreationEdition')
        @endif
    @endif
