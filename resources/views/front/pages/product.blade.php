@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Proizvod</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    @isset($product)
        <div class="products">
            <div class="container">
                <div id="alert">

                </div>
                <div class="agileinfo_single">
                    <div class="col-md-4 agileinfo_single_left">
                        <img id="example" src="{{ asset('/'.$product[0]->src) }}" alt="{{ $product[0]->alt }}" class="img-responsive">
                    </div>
                    <div class="col-md-8 agileinfo_single_right">
                        <h2>{{ $product[0]->title }} </h2>
                        @if(session()->has('user'))
                            <div class="rating1">
                                    <span class="starRating">
                                        @for($i=5;$i>=1;$i--)
                                            <input id="rating{{$i}}" class="rate" type="radio" name="rating" value="{{ $i }}">
                                            <label for="rating{{$i}}">{{$i}}</label>
                                        @endfor
                                    </span>
                                <input type="hidden" value="{{ session()->get('user')[0]->id }}" class="user"/>
                            </div>
                        @endif
                        <div class="w3agile_description">
                            <h4>Opis :</h4>
                            <p>{{ $product[0]->description }}</p>
                        </div>
                        <div class="snipcart-item block">
                            <div class="snipcart-thumb agileinfo_single_right_snipcart">
                                <h4 class="m-sing">{{ $product[0]->price - $product[0]->price * $product[0]->discount / 100 }} rsd.
                                    @if($product[0]->discount != 0)
                                        <span>{{ $product[0]->price }} rsd.</span>
                                    @endif
                                </h4>
                            </div>

                        @if(session()->has('user') && $product[0]->state > 0)
                                <div class="btnFloat snipcart-details top_brand_home_details">
                                    <form action="{{ asset('/cart/'.$product[0]->id) }}" method="post">
                                        {{ csrf_field() }}
                                        <fieldset>
                                            <input type="hidden" name="user" value="{{ session()->get('user')[0]->id }}"/>
                                            <input type="submit" name="submit" value="Dodaj u korpu" class="button">
                                        </fieldset>
                                    </form>
                                </div>
                            @elseif($product[0]->state == 0)
                                <b>Nema na stanju</b>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    
        <div class="clearfix"> </div>
        <div id="comment">

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if(session()->has('user'))
                <div class="container">
                    <h3>Komentari</h3>
                        <div class="formComment card my-4">
                            <h5 class="card-header">Vasi utisci:</h5>
                            <div class="card-body">
                                <form action="{{ route('comment') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" name="text"></textarea>
                                    </div>
                                    <input type="hidden" name="id_product" value="{{ $product[0]->id }}" />
                                    <button type="submit" class="btn btn-primary">Postavi</button>
                                </form>
                            </div>
                        </div>
                </div>
                @endif
                @foreach($product[0]->comments as $comment)
                    <div id="comment-text" class="media mb-4 {{ ($loop->first)  ? 'border' : '' }}">
                        <img class="d-flex mr-3 rounded-circle" src="{{asset('/')}}images/profile.jpg" alt="profile"/>
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->username }}</h5>
                            <p>{{ $comment->text }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="clearfix"> </div>
    @endisset
@endsection