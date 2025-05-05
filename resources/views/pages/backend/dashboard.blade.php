@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        @include('include.backend.dashboard.page-title') <!-- end page title --> 

        @include('include.backend.dashboard.counter') <!-- end counter -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection