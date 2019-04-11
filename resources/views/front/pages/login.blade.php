@extends('front.layout.template')

@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Logovanje</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br/>
                    @endforeach
                </div>
            @endif

            <h2>Prijavi se</h2>

            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="email" placeholder="Email" required=" " name="email"/>
                    <input type="password" placeholder="Lozinka" required=" " name="password"/>
                    <input type="submit" value="Prijavi se"/>
                </form>
            </div>
            <h4>Nemas nalog?</h4>
            <p><a href="{{ asset('/registration') }}">Registruj se ovde</a> ili idi nazad do <a href="{{ route('home') }}">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>
    </div>
    <!-- //login -->
@endsection