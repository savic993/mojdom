@foreach($products as $product)

    <div class="col-md-5 top_brand_left margin">

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

                                    @endif</h4>

                            </div>

                            @if((session()->has('user')) && ($product->state > 0))

                                <div class="snipcart-details top_brand_home_details">

                                    <form action="{{ asset('/cart/'.$product->id) }}" method="post">

                                        {{ csrf_field() }}

                                        <fieldset>

                                            <input type="hidden" name="user" value="{{ session()->get('user')[0]->id }}"/>

                                            <input type="submit" name="submit" value="Dodaj u korpu" class="button">

                                        </fieldset>

                                    </form>

                                </div>

                            @elseif(session()->has('user') &&($product->state == 0))

                                <div class="snipcart-details top_brand_home_details">

                                    <h3>Nema na stanju</h3>

                                </div>

                            @endif

                        </div>

                    </figure>

                </div>

            </div>

        </div>

    </div>

@endforeach

<div class="clearfix">

</div>

<nav id="page" class="numbering">

    {{ $products->links() }}

</nav>



<script>



    var perPage = $('#country1').val();



    $('.pagination a').click(

        function(e){

       

            e.preventDefault();

    

            var url = $(this).attr('href');

            var page = url.split('page=')[1];

            

    

            $.ajax({

                url: baseURl + '/pagination?page=' + page,

                data: 

                {

                    perPage : perPage

                }

            }).done(function(data){

                $('.agile_top_brands_grids').html(data);

            });

        }

    );



</script>

