@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre de la Categoria</label>
            <input type="text" class="form-control" id="name" name="name" required />
        </div>
</div>
<button type="submit" class="btn btn-primary" name="creaer">Crear</button>
</form>
</div>
@endsection