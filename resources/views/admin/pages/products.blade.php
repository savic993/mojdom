@extends('admin.layout.template')

@section('content')
    @isset($product)
        @include('admin.components.products.update')
    @endisset

    @isset($products)
        @include('admin.components.products.insert')
        @include('admin.components.products.table')
    @endisset
@endsection