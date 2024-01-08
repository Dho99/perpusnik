@extends('layouts.main')
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
            <div class="col-lg-3 col-12 d-flex justify-content-center text-center">
                <a href="/baca-buku" class="text-decoration-none">
                    <div class="card shadow menuCard" style="width: 18rem;">
                        <i class="bi bi-journal-text h1 pt-4 pb-0 m-0"></i>
                        <div class="card-body">
                            <h5 class="card-title">Baca Buku</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 text-center d-flex justify-content-center">
                @if (Auth::check())
                    <a href="/pinjam-buku" class="text-decoration-none">
                    @else
                        <a href="/login" class="text-decoration-none">
                @endif
                <div class="card shadow menuCard" style="width: 18rem;">
                    <i class="bi bi-journal-arrow-down h1 pt-4 pb-0 m-0"></i>
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
                    <i class="bi bi-journal-arrow-up h1 pt-4 pb-0 m-0"></i>
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
                <h2 class="text-start fw-bold">Buku Terbaru</h2>
                <div class="my-4 pe-3">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="container bg-primary bg-opacity-50 rounded py-2">
                            <div class="row">
                                <div class="col-lg-3">
                                    s
                                </div>
                                <div class="col-lg-9">
                                    s
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="text-end fw-bold">Buku Terpopuler</h2>
                <div class="my-4 ps-3">
                    <a href="#" class="text-decoration-none text-dark">
                        <div class="container bg-primary bg-opacity-50 rounded py-2">
                            <div class="row">
                                <div class="col-lg-3">
                                    s
                                </div>
                                <div class="col-lg-9">
                                    s
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
