{{-- Layouts for frontend page (non auth)--}}
@extends('layouts.global')
<link rel="stylesheet" href="{{asset('assets/styles/frontend-page.css')}}">
@section('main')
    @include('components.navbar')
    @yield('content')
    @include('components.footer')
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('error'))
<script>
    swal({
    title: '{{session("error")}}',
    className: 'text-danger',
    icon: 'error',
    button: {
        text: 'Siap, laksanakan!',
        className : 'btn bg-danger text-light',
    },
    });
</script>
@endif
@endpush
