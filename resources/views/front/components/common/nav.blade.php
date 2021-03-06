<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    @foreach($menus as $menu)
                            <li class="active"><a href="{{ asset($menu->href) }}" class="{{ ($loop->first) ? 'act' : '' }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>