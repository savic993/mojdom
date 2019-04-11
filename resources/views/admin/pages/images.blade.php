@extends('admin.layout.template')

@section('content')
    @isset($galleries)
        @include('admin.components.images.insert')
        @include('admin.components.images.table')
    @endisset

    @isset($images)
        @include('admin.components.images.tableImages')
    @endisset
@endsection