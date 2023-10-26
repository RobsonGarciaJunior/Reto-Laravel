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
                        </div>
                        @endif
                        @if(Auth::user()->id == $incidency->user->id)
                        <form action="{{route('comments.destroy',$comment)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
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
        <section >
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                    <div class="card-body">
                    </div>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <div class="form-outline w-100">
                                <form class="mt-2" name="create_platform" action="{{route('comments.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <textarea class="form-control" id="text" name="text" rows="4" style="background: #fff;" placeholder="Escribe algo..."></textarea>
                                <input class="form-control" id="usedTime" name="usedTime" type="number"></input>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">Comentar</button>
                        </div>
                        </form>
                        <!--<button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>-->
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
</section>
        @endif
    @endif
@endsection