<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <p> VELIKO SNIZENJE SNIZENJE I DO 50%.  <a href="{{ asset('/action') }}">KUPI ODMAH</a></p>
        </div>
        <div class="agile-login">
            <ul>
                @if(!session()->has('user'))
                    <li><a href="{{ asset('/registration') }}"> Registruj se </a></li>
                    <li><a href="{{ asset('/login') }}">Prijavi se</a></li>
                @else 
                    <a class="w3view-cart" href="{{ asset('/cart/'.session()->get('user')[0]->id) }}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                    <li><a href="{{ asset('/logout') }}">Odjavi se</a></li>
                @endif
                <li><a href="{{ asset('/contact') }}">Kontakt</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Kontaktiraj nas i putem telefona : (+0123) 234 567</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="{{ asset('/') }}">Moj Dom</a></h1>
        </div>
        <div class="w3l_search">
            <form action="#" method="post">
                <input type="search" name="Search" placeholder="Pretrazi proizvod..." required="">
                <button type="button" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>