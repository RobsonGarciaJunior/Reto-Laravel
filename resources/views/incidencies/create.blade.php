@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('incidencies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre de la Incidencia</label>
            <input type="text" class="form-control" id="title" name="title" required />
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="text" name="text" required />
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Tiempo estimado para solucionar la Incidencia</label>
            <input type="text" class="form-control" id="estimatedTime" name="estimatedTime" required />
        </div>
        <div class="form-group mb-3">
            <select class="form-select" name="categoryId" id="categoryId">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="">Crear</button>
    </form>
</div>
@endsection