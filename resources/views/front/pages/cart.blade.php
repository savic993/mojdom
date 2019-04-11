@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Korpa</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- checkout -->
    <div class="checkout">
        <div class="container">

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <h2>Vasa korpa sadrzi: <span>{{ $products->count() }} Poizvoda</span></h2>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th> No.</th>
                        <th>Proizvod</th>
                        <th>Naslov</th>

                        <th>Cena</th>
                        <th>Izbrisi</th>
                    </tr>
                    </thead>
                    @foreach($products as $product)
                        <tr>
                            <td class="invert">{{ $loop->index }}</td>
                            <td class="invert-image">
                                <img src="{{ asset($product->src) }}" alt="{{ $product->alt }}" class="img-responsive" />
                            </td>
                            <td class="invert">{{ $product->title }}</td>

                            <td class="invert">{{ $product->price - $product->price * $product->discount / 100 }} RSD</td>
                            <td class="invert">
                                <div class="rem">
                                    <a href="{{ asset('/cart/delete/'.$product->cartId) }}"><div class="close1"> </div></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="checkout-left">
                <div class="checkout-left-basket">
                    <h4>Ukupno za placanje</h4>
                    <ul>
                        @foreach($products as $product)
                            <li>{{ $product->title }} <i>-</i> <span class="price">{{ $product->price - $product->price * $product->discount / 100 }} RSD</span></li>
                        @endforeach
                        <li>Ukupni troskovi usluga <i>-</i> <span>00,00 RSD</span></li>
                        <li>Ukupno za placanje <i>-</i> <span class="total">00,00 RSD</span></li>
                    </ul>
                </div>
                <div class="checkout-right-basket">
                    <a href="{{ asset('/products') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Nastavite kupovinu</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //checkout -->
@endsection