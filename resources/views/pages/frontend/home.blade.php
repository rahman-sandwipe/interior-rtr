@extends('layouts.guest')
@section('title', 'Home')
@section('content')
    @include('include.frontend.homes.banner-section') <!-- end banner section -->

    @include('include.frontend.homes.contact-section') <!-- end contact section -->

    @include('include.frontend.homes.about-section') <!-- end about section -->

    @include('include.frontend.homes.services-section') <!-- end services section -->

    @include('include.frontend.homes.counter-section') <!-- end customer counter section -->
    
    @include('include.frontend.homes.team-section') <!-- end team section -->

    @include('include.frontend.homes.workprocess-section') <!-- end work process section -->
    
    @include('include.frontend.homes.case-study-section') <!-- end case study section -->
@endsection
