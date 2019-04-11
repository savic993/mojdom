<div class="newproducts-w3agile">
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <h3>Nove ponuda</h3>
        <div class="container">
    <div id="ajax">
    </div>
    </div>
        <div class="agile_top_brands_grids">
            @foreach($products as $product)
            <div class="col-md-4 top_brand_left-1 space">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                            <img src="{{ asset('/') }}images/offer.png" alt="offer" class="img-responsive">
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                            <a href="{{ asset('/products/'.$product->id) }}"><img alt="{{ $product->alt }}" src="{{ asset('/'.$product->src) }}"></a>
                                        <p>{{ $product->title }}</p>
                                        <div class="stars">
                                            @for($i=0;$i<5;$i++)
                                                @if($product->rate > $i)
                                                    <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <h4>{{ $product->price - $product->price * $product->discount / 100 }} rsd.
                                            @if($product->discount != 0)
                                                <span>{{ $product->price }} rsd.</span>
                                            @endif
                                        </h4>
                                    </div>

                                    @if(session()->has('user') && $product->state > 0)
                                        <div class="snipcart-details top_brand_home_details">
                                            <form action="{{ asset('/cart/'.$product->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <fieldset>
                                                    <input type="hidden" name="user" value="{{ session()->get('user')[0]->id }}"/>
                                                    <input type="submit" name="submit" value="Dodaj u korpu" class="button">
                                                </fieldset>
                                            </form>
                                        </div>
                                    @elseif($product->state == 0) <b>Nema na stanju</b>@endif
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>