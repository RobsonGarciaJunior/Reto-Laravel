@extends('layouts.app')
@section('content')
    <div class="container">
    <span style="padding: 1em; display: flex; justify-content: space-between;">
    <div style="display: flex; flex-flow: column nowrap;">    
        <h1>{{$incidency->title}}</h1>
        
            <h4>{{$incidency->text}}</h4>
            <h5>Tiempo Estimado: {{$incidency->estimatedTime}}h</h5>
            <h6>Escrito por: {{$incidency->user->name}} a las {{$incidency->created_at}}h</h6>
        </div>
        @if(Auth::check())
        <div class="btn-toolbar" style="display: inline; justify-content: space-between;" data-toggle="buttons">
            <a class="btn btn-warning btn-sm" href="{{route('incidencies.edit',$incidency)}}" role="button">Editar Incidencia</a>
        </div>
        @endif
    </span>
    </div>
    @include('comments.personalLayouts.comments')
@endsection