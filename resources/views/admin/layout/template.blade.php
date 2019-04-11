<!DOCTYPE html>
<html lang="en">

@include('admin.components.common.head')

<body id="page-top">

@include('admin.components.common.nav')

<div id="wrapper">

@include('admin.components.common.sidebar')

    <div id="content-wrapper">

        <div class="container-fluid">

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @isset($errors)
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            @endisset

            @yield('content')

        </div>
        <!-- /.container-fluid -->

        @include('admin.components.common.footer')

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@include('admin.components.common.logout')

@include('admin.components.common.script')

</body>

</html>
