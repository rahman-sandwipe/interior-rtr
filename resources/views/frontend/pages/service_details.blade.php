@extends('layouts.guest')
@section('title', 'Services')
@section('content')
    @include('frontend.include.serives.page-title') <!-- end page title section -->
    @include('frontend.include.serives.service-details') <!-- end services section -->
    @include('frontend.include.serives.service-faq') <!-- end service faq section -->
@endsection