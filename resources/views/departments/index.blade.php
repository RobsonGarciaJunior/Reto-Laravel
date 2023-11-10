@extends('layouts.app')
@section('content')
@include('layouts.indexLayout',['nombre'=>'Departamentos', 'items' => $departments, 'item_show_path'=>'departments.show','item_create_path'=>'departments.create', 'item_edit_path'=>'departments.edit','item_destroy_path'=>'departments.destroy'])
@endsection