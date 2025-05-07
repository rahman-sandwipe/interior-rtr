@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    @include('backend.include.dashboard.page-title') <!-- end page title --> 
    @include('backend.include.dashboard.counter') <!-- end counter -->
@endsection