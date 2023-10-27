@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>{{$incidency->title}}</h1>
    <h4>{{$incidency->text}}</h4>
    <h5>Tiempo Estimado: {{$incidency->estimatedTime}}h</h5>
    <h6>Escrito por: {{$incidency->user->name}} a las {{$incidency->created_at}}h</h6>
    </div>
    @include('layouts.comments')
@endsection