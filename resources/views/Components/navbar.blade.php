<nav class="navbar navbar-expand-lg bg-primary-subtle">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/icons/icons8-book-100.png') }}" class="img-fluid" alt="">
            <span class="fw-bolder ms-1 text-primary">Perpusnik</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-auto m-0" role="search">
                <input class="form-control rounded-end-0" type="search" placeholder="Cari Buku" aria-label="Search">
                <button class="btn btn-primary rounded-start-0" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('home') ? 'active text-primary' : ''}}" aria-current="page" href="/home">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Request::is('categories') ? 'active text-primary' : ''}}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle open" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Anda
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li class=""><a class="dropdown-item btn text-danger" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                <li class="nav-item ms-2">
                    <a class="btn btn-info text-light" aria-current="page" href="/login">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
