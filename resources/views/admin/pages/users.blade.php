@extends('admin.layout.template')

@section('content')

    @isset($user)
        @include('admin.components.users.update')
    @endisset

    @isset($users)
        @include('admin.components.users.table')
    @endisset

@endsection