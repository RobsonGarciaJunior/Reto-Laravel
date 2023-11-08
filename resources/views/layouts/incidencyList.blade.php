<h5>Incidencias</h5>
@for ($i = 0; $i < 5; $i++) <ul>
    @if(isset($department->incidencies[$i]))
        <li>
            <a href="{{route('incidencies.show', $department->incidencies[$i])}}">{{$department->incidencies[$i]->title}}</a>
        </li>
    @endif
    @if(isset($category->incidencies[$i]))
        <li>
            <a href="{{route('incidencies.show', $category->incidencies[$i])}}">{{$category->incidencies[$i]->title}}</a>
        </li>
    @endif
    @if(isset($priority->incidencies[$i]))
        <li>
            <a href="{{route('incidencies.show', $priority->incidencies[$i])}}">{{$priority->incidencies[$i]->title}}</a>
        </li>
    @endif
    @if(isset($state->incidencies[$i]))
        <li>
            <a href="{{route('incidencies.show', $state->incidencies[$i])}}">{{$state->incidencies[$i]->title}}</a>
        </li>
    @endif
    </ul>
 @endfor