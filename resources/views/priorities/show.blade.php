@extends('layouts.app')
@section('content')
@include('layouts.showLayout',['item' => $priority, 'item_edit_path'=>'priorities.edit'])
@endsection