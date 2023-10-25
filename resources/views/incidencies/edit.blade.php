@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('incidencies.update',$incidency)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre de la Incidencia</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{$incidency->title}}" />
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="text" name="text" required value="{{$incidency->text}}" />
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Tiempo estimado para solucionar la Incidencia</label>
            <input type="text" class="form-control" id="estimatedTime" name="estimatedTime" required value="{{$incidency->estimatedTime}}" />
        </div>
        <div class="form-group mb-3">
            <select class="form-select" name="categoryId" id="categoryId">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($incidency->category->name == $category->name) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="">Editar</button>
    </form>
</div>
@endsection