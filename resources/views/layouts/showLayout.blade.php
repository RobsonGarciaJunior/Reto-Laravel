<div class="container">
    <span style="padding: 1em; display: flex; justify-content: space-between;">
        <div style="display: flex; flex-flow: column nowrap;">    
            <h1>{{$item->name}}</h1>
            <p>Incidencias</p>
            @if($item->incidencies()->exists())
                @include('layouts.incidencyList',['items'=> $item])
            @else
                <p>0</p>
            @endif
        </div>
        @if(Auth::check())
            <div class="btn-toolbar" style="display: inline; justify-content: space-between;" data-toggle="buttons">
                <a class="btn btn-warning btn-sm" href="{{route($item_edit_path,$item)}}" role="button">Editar</a>
            </div>
        @endif
    </span>
</div>