@extends('global.layouts.layouts')
@section('main')
<link rel="stylesheet" href="{{asset('assets/styles/login-page.css')}}">
    <div class="row d-flex justify-content-center m-0" style="height: 100vh;">
        <div class="col-lg-6 d-flex align-items-center">
            <div class="container px-4">
                <div class="card shadow m-0 p-0 loginWrapper">
                    <img src="{{asset('assets/icons/icons8-book-100.png')}}" class="card-img-top img-fluid m-auto mt-4" alt="Login Header Logo">
                    <div class="card-body text-center px-4">
                        <h5 class="card-title fw-bold">PERPUSNIK</h5>
                        <p class="card-text">Perpustakaan elektronik berbasis Elektronik</p>
                        <hr class="">
                        </hr>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="row px-3 mb-4">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-people"></i></span>
                                    <input type="text" class="form-control {{session()->has('loginFailed') ? 'is-invalid' : ''}}" placeholder="Username" name="username" value="{{old('username')}}" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                                @if(session()->has('loginFailed'))
                                    <p class="text-danger text-start fw-bold mb-0">{{session('loginFailed')}}</p>
                                @endif
                                <div class="input-group mb-4 mt-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                </div>
                                <button type="submit" class="btn btn-primary w-75 m-auto">Log In</button>
                                <div class="my-2">Atau</div>
                                <a href="#" class="text-primary text-undeline">Daftar Sekarang</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 p-0 d-lg-block d-none">
            <div class="bg-primary-subtle h-100 d-flex align-items-center justify-content-center">
                <img src="{{asset('assets/image/login-page-image.png')}}" class="img-fluid shadow" alt="">
            </div>
        </div>
    </div>
@endsection
