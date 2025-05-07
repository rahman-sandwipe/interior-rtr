@extends('layouts.app')
@section('title', 'Services')
@section('content')
    @include('backend.include.services.page-title') <!-- end page title --> 
    @include('backend.include.services.serviceList') <!-- end service list -->
    @include('backend.include.services.serviceDetails') <!-- end service details -->
    @include('backend.include.services.serviceForm') <!-- end service form -->
@endsection