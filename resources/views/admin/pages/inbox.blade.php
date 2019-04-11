@extends('admin.layout.template')

@section('content')
    @isset($message)
        @include('admin.components.inbox.message')
    @endisset

    @isset($messages)
        @include('admin.components.inbox.table')
    @endisset
@endsection