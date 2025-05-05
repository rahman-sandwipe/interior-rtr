@extends('layouts.guest')
@section('title', 'Home')
@section('content')
    @include('frontend.include.homes.banner-section') <!-- end banner section -->
    @include('frontend.include.homes.contact-section') <!-- end contact section -->
    @include('frontend.include.homes.about-section') <!-- end about section -->
    @include('frontend.include.homes.services-section') <!-- end services section -->
    @include('frontend.include.homes.counter-section') <!-- end customer counter section -->
    @include('frontend.include.homes.team-section') <!-- end team section -->
    @include('frontend.include.homes.workprocess-section') <!-- end work process section -->
    @include('frontend.include.homes.case-study-section') <!-- end case study section -->
@endsection
