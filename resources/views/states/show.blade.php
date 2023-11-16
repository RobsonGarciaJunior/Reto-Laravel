@extends('layouts.app')
@section('content')
@include('layouts.showLayout',['item' => $state, 'item_edit_path'=>'states.edit'])
@endsection