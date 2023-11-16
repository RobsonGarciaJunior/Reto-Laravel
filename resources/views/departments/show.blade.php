@extends('layouts.app')
@section('content')
@include('layouts.showLayout',['item' => $department, 'item_edit_path'=>'departments.edit'])
@endsection