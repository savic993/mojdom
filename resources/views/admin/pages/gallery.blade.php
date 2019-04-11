@extends('admin.layout.template')

@section('content')

    @isset($gallery)
        @include('admin.components.gallery.update')
    @endisset

    @isset($galleries)
        @include('admin.components.gallery.insert')
        @include('admin.components.gallery.table')
    @endisset
@endsection