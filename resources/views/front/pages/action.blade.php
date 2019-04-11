@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Proizvodi na akciji</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <div class="products">
        <div class="container">
                @include('front.components.category')
            <div class="col-md-8">
                
                @include('front.components.actionFilter')
                <div id="ajax">
                </div>
                <div class="agile_top_brands_grids">
                    @component('front.components.products.prod', ['products' => $products])
                    @endcomponent
                    <div class="clearfix"> </div>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection