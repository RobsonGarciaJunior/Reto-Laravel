@extends('layouts.app')
@section('content')
@include('layouts.showLayout',['item' => $category, 'item_edit_path'=>'categories.edit'])
@endsection