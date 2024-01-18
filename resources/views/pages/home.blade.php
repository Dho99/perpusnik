@extends('layouts.main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@section('content')
    <div class="container mt-5 mb-0">
        <div class="row d-flex">
            <div class="col-lg-6 m-auto order-lg-1 order-2 text-center text-lg-start">
                <div class="ms-5">
                    <h1 class="">Cari Buku Favorit dan Kesukaanmu</h1>
                    <h3>di <span class="h2 text-primary fw-bolder">Perpusnik</span></h3>
                    <p class="h5 pt-2">Baca-Dengar-Pahami-Ulangi</p>
                </div>
            </div>
            <div class="col-lg-6 d-flex m-auto justify-content-center order-lg-2 order-1">
                <img src="{{ asset('assets/image/reading-image.png') }}" class="img-fluid right-hero-image" alt="">
            </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1704635727 position-relative">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                class="shape-fill"></path>
        </svg>
    </div>
    <div class="container-fluid bg-primary-subtle py-5">
        <h2 class="text-center my-5">Pilih apa yang anda inginkan</h2>
        <div class="container row gap-5 d-flex justify-content-center m-auto pb-5 mb-5">
            <div class="col-lg-3 text-center d-flex justify-content-center">
                <a href="/baca-buku" class="text-decoration-none">
                    <div class="card shadow menuCard" style="width: 18rem;">
                        <i class="bi bi-book h1 pt-4 pb-0 m-0"></i>
                        <div class="card-body">
                            <h5 class="card-title">Baca Buku</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 text-center d-flex justify-content-center">
                @if (Auth::check())
                    <a href="/books/collections" class="text-decoration-none">
                    @else
                        <a href="/login" class="text-decoration-none">
                @endif
                <div class="card shadow menuCard" style="width: 18rem;">
                    <i class="bi bi-bookmark-plus h1 pt-4 pb-0 m-0"></i>
                    <div class="card-body">
                        <h5 class="card-title">Pinjam Buku</h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 text-center d-flex justify-content-center">
                @if (Auth::check())
                    <a href="/kembalikan-buku" class="text-decoration-none">
                    @else
                        <a href="/login" class="text-decoration-none">
                @endif
                <div class="card shadow menuCard" style="width: 18rem;">
                    <i class="bi bi-bookmark-dash h1 pt-4 pb-0 m-0"></i>
                    <div class="card-body">
                        <h5 class="card-title">Kembalikan Buku</h5>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1704723237 position-relative">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path
                d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                class="shape-fill"></path>
        </svg>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-start fw-bold pb-2">Buku Terbaru</h2>
                @forelse ($latestBooks as $book)
                    <div class="my-3 pe-0 pe-lg-3">
                        <a href="#" class="text-decoration-none text-dark d-flex">
                            <div class="container bg-primary bg-opacity-25 rounded rounded-end-0">
                                <div class="row d-flex p-3">
                                    <div class="col-lg-7">
                                        {{ $book->judul }}
                                    </div>
                                    <div class="col-lg-5">
                                        {{ $book->penulis }}
                                    </div>
                                </div>
                            </div>
                            <div class="bg-primary text-light rounded rounded-start-0 d-flex px-2">
                                <p class="m-auto">{{ $book->category->namaKategori }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="my-3">
                        <a href="#" class="text-decoration-none text-dark">
                            <div class="container bg-primary bg-opacity-50 rounded py-2">
                                <h4 class="text-center fw-bold">Tidak ada buku terpopuler</h4>
                            </div>
                        </a>
                    </div>
                @endforelse
            </div>
            <div class="col-lg-6 py-lg-0 py-5 ">
                <h2 class="text-start text-lg-end fw-bold pb-2 mt-5">Buku Terpopuler</h2>
                @forelse ($popularBooks as $book)
                    <div class="my-3 ps-0 ps-lg-3">
                        <a href="#" class="text-decoration-none text-dark d-flex">
                            <div class="container bg-primary bg-opacity-25 rounded rounded-end-0">
                                <div class="row d-flex p-3">
                                    <div class="col-lg-7">
                                        {{ $book->judul }}
                                    </div>
                                    <div class="col-lg-5">
                                        {{ $book->penulis }}
                                    </div>
                                </div>
                            </div>
                            <div class="bg-primary text-light rounded rounded-start-0 d-flex px-2">
                                <p class="m-auto">{{ $book->category->namaKategori }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="my-3">
                        <a href="#" class="text-decoration-none text-dark">
                            <div class="container bg-primary bg-opacity-50 rounded py-2">
                                <h4 class="text-center fw-bold">Tidak ada buku terpopuler</h4>
                            </div>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    </div>
    <div class="container py-5">
        <h3 class="text-center fw-bold">Kategori Buku</h3>
        <div class="row gap-4 py-4 d-flex justify-content-center">
            @forelse ($categories as $category)
                <a href="#" class="col-lg-2 col-md-3 col-6 px-3 py-2 btn btn-outline-primary">
                    {{ $category->namaKategori }}
                </a>
            @empty
                <a href="#" class="col-12 px-3 py-2 btn btn-outline-primary">
                    Tidak ada Kategori
                </a>
            @endforelse

        </div>
    </div>
    <div class="container py-5">
        <h3 class="text-center fw-bold">Komentar</h3>
        <div class="row py-4 d-flex justify-content-center swiper">
            <div class="swiper-wrapper gap-3">
                <div class="col-lg-2 col-md-3 col-6 px-3 py-2 bg-primary swiper-slide rounded text-light">
                    ssss
                </div>
                <div class="col-lg-2 col-md-3 col-6 px-3 py-2 bg-primary swiper-slide rounded text-light">
                    ssss
                </div>
                <div class="col-lg-2 col-md-3 col-6 px-3 py-2 bg-primary swiper-slide rounded text-light">
                    ssss
                </div>
                <div class="col-lg-2 col-md-3 col-6 px-3 py-2 bg-primary swiper-slide rounded text-light">
                    ssss
                </div>
                <div class="col-lg-2 col-md-3 col-6 px-3 py-2 bg-primary swiper-slide rounded text-light">
                    ssss
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            slidesPerView: 3,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true
            },
        });
    </script>
@endpush
