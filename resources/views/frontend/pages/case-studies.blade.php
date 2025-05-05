@extends('layouts.guest')
@section('title', 'Case Studies')
@section('content')
    @include('frontend.include.case-studies.page-title') <!-- end page title section -->
    @include('frontend.include.case-studies.case-studies') <!-- end case studies section -->
    @include('frontend.include.case-studies.case-studies-faq') <!-- end case studies faq section -->
@endsection