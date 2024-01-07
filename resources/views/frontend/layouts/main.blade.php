{{-- Layouts for frontend page (non auth)--}}
@extends('global.layouts.layouts')
<link rel="stylesheet" href="{{asset('assets/styles/frontend-page.css')}}">
@section('main')
    @include('frontend.components.navbar')
    @yield('content')
@endsection
