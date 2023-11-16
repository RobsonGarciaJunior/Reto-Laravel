@for ($i = 0; $i < 5; $i++)
<ul>
    @if(isset($items->incidencies[$i]))
        <li>
            <a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{route('incidencies.show', $item->incidencies[$i])}}">{{$item->incidencies[$i]->title}}</a>
        </li>
    @endif
</ul>
 @endfor