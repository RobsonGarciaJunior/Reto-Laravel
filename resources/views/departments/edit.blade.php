@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('departments.update',$department)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="newName" class="form-label">Nuevo Nombre del Departamento</label>
            <input type="text" class="form-control" id="newName" name="newName" required value="{{$department->name}}" />
        </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection