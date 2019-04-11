@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Galerije</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
<div class="row">
    <div class="container">
        <div class="col-md-7" id="gallery">
            @foreach($galleries as $gallery) 
                <div class="gallery col-md-5">
                    @isset($gallery->img)
                    <div class="col-md-12">
                        <a href="{{ asset('/gallery/'.$gallery->id) }}">
                            <img src="{{ asset($gallery->img->src) }}" alt="{{ $gallery->img->alt }}" width="200" height="200">
                        </a>
                    </div>
                    @endisset
                    <div class="desc col-md-12">{{ $gallery->name }}</div>
                </div>
            @endforeach
        </div>
        <div id="banner" class="col-md-5">
            <a href="{{ asset('/action') }}"><img alt="banner" src="{{ asset('/') }}images/banner.jpg" /></a>
        </div>
    </div>
</div>
@endsection