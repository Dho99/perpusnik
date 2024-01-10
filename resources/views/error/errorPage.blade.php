@extends('layouts.main')
@section('main')
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <h2 class="fw-bolder">{{$code}}</h2>
        <p class="ms-2">{{$message}}</p>
    </div>
@endsection
