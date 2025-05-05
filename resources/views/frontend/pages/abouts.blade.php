@extends('layouts.guest')
@section('title', 'Abouts')
@section('content')
    @include('frontend.include.abouts.page-title') <!-- end page title section -->
    @include('frontend.include.abouts.abouts') <!-- end abouts section -->
    @include('frontend.include.abouts.customer-widged') <!-- end customer widged section -->
    @include('frontend.include.abouts.our-specialist') <!-- end our specialist section -->
    @include('frontend.include.abouts.mission-vision') <!-- end mission vision section -->
@endsection