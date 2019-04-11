@extends('admin.layout.template')

@section('content')

    @isset($category)
        @include('admin.components.category.update')
    @endisset

    @isset($categories)
        @include('admin.components.category.insert')
        @include('admin.components.category.table')
    @endisset
@endsection