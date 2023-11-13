<div class="container">
    <form class="mt-2" name="create_platform"
        @if(isset($department))
            action="{{route('departments.update', $department)}}"
        @else
            action="{{route('departments.store')}}"
        @endif
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($department))
        @method('PUT')
        @endif
  
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre del Departamento</label>
            <input type="text" class="form-control" id="name" name="name" required 
            @if(isset($department))
            value="{{$department->name}}"
            @endif/>
        </div>

        <button type="submit" class="btn btn-primary" name="">
            @if(isset($department))
                Editar
            @else
                Crear
            @endif
        </button>
    </form>
</div>
