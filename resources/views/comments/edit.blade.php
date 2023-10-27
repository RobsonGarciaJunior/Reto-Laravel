@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('comments.update',$comment)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="newName" class="form-label">Comentario</label>
            <input type="text" class="form-control" id="text" name="text" value="{{$comment->text}}" required/>
            <input type="text" class="form-control" id="usedTime" name="usedTime" value="{{$comment->usedTime}}" required/>
        </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection