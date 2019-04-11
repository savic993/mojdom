<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3>Kontakt</h3>

                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Vojvode Milenka 18, <span>Lajkovac.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:mojdom@gmail.com">mojdom@gmail.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Linkovi</h3>
                <ul class="info">
                    @foreach($menus as $menu)
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ asset($menu->href) }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3>Kategorije</h3>
                <ul class="info">
                    @foreach($categories as $category)
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ asset('/category/'.$category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
                <div class="col-md-3 w3_footer_grid">
                    <h3>Nalog</h3>
                    <ul class="info">
                        @if(session()->has('user'))
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ asset('/cart/'.session()->get('user')[0]->id) }}">Vasa korpa</a></li>
                        @endif
                        @if(!(session()->has('user')))
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ asset('/login') }}">Prijavi se</a></li>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ asset('/registration') }}">Registruj se</a></li>
                        @endif
                    </ul>
                </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="footer-copy">

        <div class="container">
            <p>© 2018 Moj Dom. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>

</div>
<div class="footer-botm">
    <div class="container">
        <div class="w3layouts-foot">
            <ul>
                <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="payment-w3ls">
            <img src="{{ asset('/') }}images/card.png" alt="card" class="img-responsive">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>