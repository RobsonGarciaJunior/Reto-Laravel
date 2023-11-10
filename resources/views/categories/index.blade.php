@extends('layouts.app')
@section('content')
@include('layouts.indexLayout',['nombre'=>'Categorias', 'items' => $categories, 'item_show_path'=>'categories.show','item_create_path'=>'categories.create', 'item_edit_path'=>'categories.edit','item_destroy_path'=>'categories.destroy'])
@endsection