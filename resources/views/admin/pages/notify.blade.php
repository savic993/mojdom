@extends('admin.layout.template')

@section('content')
    @isset($notification)
        @include('admin.components.notify.table')
    @endisset

@endsection