@extends('layouts.app')
@section('content')
@include('layouts.indexLayout',['nombre'=>'Estados', 'items' => $states, 'item_show_path'=>'states.show','item_create_path'=>'states.create', 'item_edit_path'=>'states.edit','item_destroy_path'=>'states.destroy'])
@endsection