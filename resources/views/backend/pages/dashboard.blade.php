@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        @include('backend.include.dashboard.page-title') <!-- end page title --> 

        @include('backend.include.dashboard.counter') <!-- end counter -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection