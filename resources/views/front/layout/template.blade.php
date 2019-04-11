<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    @include('front.components.common.head')
<body>
    @include('front.components.common.header')
    @include('front.components.common.nav')
    @include('front.components.common.slider')
    @if(session()->has('error'))
    <div id="alert" class="row">
        <div class=" container alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
    @endif
    @yield('content')
    @include('front.components.common.footer')
    @include('front.components.common.scripts')
</body>
</html>