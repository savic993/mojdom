<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Pocetna</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Stranice</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Sadrzaj:</h6>
            <a class="dropdown-item" href="{{ asset('/admin/gallery') }}">Galerije</a>
            <a class="dropdown-item" href="{{ asset('/admin/category') }}">Kategorije</a>
            <a class="dropdown-item" href="{{ asset('/admin/users') }}">Korisnici</a>
            <a class="dropdown-item" href="{{ asset('/admin/cart') }}">Korpa</a>
            <a class="dropdown-item" href="{{ asset('/admin/product') }}">Proizvodi</a>
            <a class="dropdown-item" href="{{ asset('/admin/slider') }}">Slajderi</a>
            <a class="dropdown-item" href="{{ asset('/admin/images') }}">Slike</a>
        </div>
    </li>
</ul>