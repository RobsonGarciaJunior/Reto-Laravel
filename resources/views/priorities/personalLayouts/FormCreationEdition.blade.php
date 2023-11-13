<div class="container">
    <form class="mt-2" name="create_platform"
        @if(isset($priority))
            action="{{route('priorities.update', $priority)}}"
        @else
            action="{{route('priorities.store')}}"
        @endif
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($priority))
        @method('PUT')
        @endif
  
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre de la Prioridad</label>
            <input type="text" class="form-control" id="name" name="name" required 
            @if(isset($priority))
            value="{{$priority->name}}"
            @endif/>
        </div>

        <div class="form-group mb-3">
            <label for="name" class="form-label">Orden de la Prioridad</label>
            <input type="text" class="form-control" id="order" name="order" required 
            @if(isset($priority))
            value="{{$priority->order}}"
            @endif/>
        </div>

        <button type="submit" class="btn btn-primary" name="">
            @if(isset($priority))
                Editar
            @else
                Crear
            @endif
        </button>
    </form>
</div>
