@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Galerija</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="row" id="gallery-images">
        <div class="container">
            @foreach($gallery as $g)
                <div class="col col-md-3">
                    <a href="{{ asset($g->src) }}" data-fancybox="{{ $g->alt }}" ><img src="{{ asset($g->src) }}" alt="{{ $g->alt }}"/></a>
                </div>
            @endforeach
        </div>
    </div>

@endsection