<div class="container">
    <form class="mt-2" name="create_platform"
        @if(isset($category))
            action="{{route('categories.update', $category)}}"
        @else
            action="{{route('categories.store')}}"
        @endif
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($category))
        @method('PUT')
        @endif
  
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre de la Categoria</label>
            <input type="text" class="form-control" id="name" name="name" required 
            @if(isset($category))
            value="{{$category->name}}"
            @endif/>
        </div>

        <button type="submit" class="btn btn-primary" name="">
            @if(isset($category))
                Editar
            @else
                Crear
            @endif
        </button>
    </form>
</div>
