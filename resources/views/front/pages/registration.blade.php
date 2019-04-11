@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Registracija</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- register -->
    <div class="register">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <h2>Registrujte se</h2>
            <div class="login-form-grids">
                <h5>Licni podaci</h5>
                <form action="{{ route('register') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Ime..." required=" "name="firstName" />
                    <input type="text" placeholder="Prezime..." required=" " name="lastName"/>
                    <h6>Podaci za logovanje</h6>
                    <input type="text" placeholder="Username" required=" " name="username"/><br/>
                    <input type="email" placeholder="Email" required=" " name="email"/>
                    <input type="password" placeholder="Lozinka" required=" " name="password"/>
                    <input type="password" placeholder="Potvrdi lozinku" required=" " name="passwordAgain"/>
                    <div class="register-check-box">
                        <div class="check">
                            <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Prihvatam pravila i uslove koriscenja</label>
                        </div>
                    </div>
                    <input type="submit" value="Registracija"/>
                </form>
            </div>
            <div class="register-home">
                <a href="{{ route('home') }}">Home</a>
            </div>
        </div>
    </div>
    <!-- //register -->
@endsection