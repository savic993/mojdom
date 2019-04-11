@extends('admin.layout.template')

@section('content')
    @isset($slide)
        @include('admin.components.slider.update')
    @endisset
    @isset($slider)
        @include('admin.components.slider.insert')
        @include('admin.components.slider.table')
    @endisset
@endsection