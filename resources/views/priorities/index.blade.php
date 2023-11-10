@extends('layouts.app')
@section('content')
@include('layouts.indexLayout',['nombre'=>'Prioridades', 'items' => $priorities, 'item_show_path'=>'priorities.show','item_create_path'=>'priorities.create', 'item_edit_path'=>'priorities.edit','item_destroy_path'=>'priorities.destroy'])
@endsection