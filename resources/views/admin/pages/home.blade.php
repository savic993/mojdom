@extends('admin.layout.template')

@section('content')
<div class="container">
    <div id="widget" class="row">
        
    <div class="container col-md-6 col-md-offset-6">
        <!-- <div class="col-xl-12 col-sm-12 mb-12"> -->
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">Inbox</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ asset('/admin/inbox') }}">
                    <span class="float-left">Pogledaj poruke</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        <!-- </div> -->
    </div>


    <div class="container col-md-6 col-md-offset-6">
        <!-- <div class="col-xl-12 col-sm-12 mb-12"> -->
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">Porudzbine</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ asset('/admin/cart') }}">
                    <span class="float-left">Pogledaj porudzbine</span>
                    <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
            </div>
        <!-- </div> -->
    </div>

    </div>
</div>
    @isset($notification)
        @include('admin.components.notify.table')
    @endisset
@endsection