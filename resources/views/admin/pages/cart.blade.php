@extends('admin.layout.template')

@section('content')
    @include('admin.components.cart.filter')
    @isset($cart)
        @include('admin.components.cart.table')
    @endisset

@endsection