<nav class="navbar navbar-expand-lg bg-primary-subtle sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('assets/icons/icons8-book-100.png') }}" class="img-fluid" alt="">
            <span class="fw-bolder ms-1 text-primary">Perpusnik</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex ms-auto m-0" action="/books/search" method="POST">
                @csrf
                <input class="form-control rounded-end-0" type="text" name="searchValue" placeholder="Cari Buku" aria-label="Search">
                <button class="btn btn-primary rounded-start-0" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link {{Request::is('home') ? 'active text-primary' : ''}}" aria-current="page" href="/home">Beranda</a>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{Request::is('categories') ? 'active text-primary' : ''}}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu">
                        @forelse ( as )
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        @empty
                        <li><a class="dropdown-item" href="#">Belum ada Kategori</a></li>
                        @endforelse
                    </ul>
                </li> --}}
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle open" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Anda
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/account/settings/{{encrypt(auth()->user()->id)}}">Pengaturan Akun</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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
