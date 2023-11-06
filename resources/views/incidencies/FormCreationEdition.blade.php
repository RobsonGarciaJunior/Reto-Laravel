<div class="container">
    <form class="mt-2" name="create_platform" 
        @if(isset($incidency))
        action="{{route('incidencies.update', $incidency)}}" method="POST" enctype="multipart/form-data"
        @else
        action="{{route('incidencies.store')}}" method="POST" enctype="multipart/form-data"
        @endif
    >
        @csrf
        @if(isset($incidency))
        @method('PUT')
        @endif
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre de la Incidencia</label>
            <input type="text" class="form-control" id="title" name="title" required 
            @if(isset($incidency))
            value= "{{$incidency->title}}"
            @endif/>
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="text" name="text" required 
            @if(isset($incidency))
            value= "{{$incidency->text}}"
            @endif/>
        </div>
        <div class="form-group mb-3">
            <label for="name" class="form-label">Tiempo estimado para solucionar la Incidencia</label>
            <input type="number" class="form-control" id="estimatedTime" name="estimatedTime" required 
            @if(isset($incidency))
            value= "{{$incidency->estimatedTime}}"
            @endif/>
        </div>
        <div class="form-group mb-3">
            <select class="form-select" name="categoryId" id="categoryId">
                @foreach ($categories as $category)
                <!-- Comprobamos que la incidencia no sea nula para saber si estamos en editar o crear -->
                <!-- Luego si no es nula, significa que estamos en editar y hay que hacer otra comprobacion para saber que categoria hemos pasado a la vista -->
                <option value="{{$category->id}}"
                    @if(isset($incidency))
                        @if($incidency->category->name == $category->name) 
                            selected 
                        @endif
                    @endif>
                {{$category->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <select class="form-select" name="priorityId" id="priorityId">
                @foreach ($priorities as $priority)
                <option value="{{$priority->id}}"
                    @if(isset($incidency))
                        @if($incidency->priority->name == $priority->name) 
                            selected 
                        @endif
                    @endif>
                {{$priority->name}}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="">
            @if(isset($incidency))
                Editar
            @else
                Crear
            @endif
        </button>
    
    </form>
</div>