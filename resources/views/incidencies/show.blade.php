@extends('layouts.app')
@section('content')
    <div class="container">
        <span style="padding: 1em; display: flex; justify-content: space-between;">
            <div style="display: flex; flex-flow: column nowrap;">    
                <h1>{{$incidency->title}}</h1>
                <p>{{$incidency->user->name}}</p>
                <p>{{$incidency->text}}</p>
                <p>Tiempo Estimado: {{$incidency->estimatedTime}}h</p>
                <p style="text-align: end;">Escrito el {{$incidency->created_at}}h</p>
            </div>
            @if(Auth::check() && Auth::user()->id == $incidency->user->id)
            <div class="btn-toolbar" style="display: inline; justify-content: space-between;" data-toggle="buttons">
                <a class="btn btn-warning btn-sm" href="{{route('incidencies.edit',$incidency)}}" role="button">Editar</a>
            </div>
            @endif
        </span>
    </div>
    @include('comments.personalLayouts.comments')
@endsection