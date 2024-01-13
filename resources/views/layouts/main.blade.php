{{-- Layouts for frontend page (non auth)--}}
@extends('layouts.global')
<link rel="stylesheet" href="{{asset('assets/styles/frontend-page.css')}}">
@section('main')
    @include('components.navbar')
    <section style="min-height: 50vh;">
        @yield('content')
    </section>
    @include('components.footer')
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush
