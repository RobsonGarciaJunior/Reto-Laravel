<div class="container">
    <form class="mt-2" name="create_platform"
        @if(isset($state))
            action="{{route('states.update', $state)}}"
        @else
            action="{{route('states.store')}}"
        @endif
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($state))
        @method('PUT')
        @endif
  
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre del Estado</label>
            <input type="text" class="form-control" id="name" name="name" required 
            @if(isset($state))
            value="{{$state->name}}"
            @endif/>
        </div>

        <button type="submit" class="btn btn-primary" name="">
            @if(isset($state))
                Editar
            @else
                Crear
            @endif
        </button>
    </form>
</div>
