@extends('layouts.app')
@section('title') Emails @endsection
@section('content')
    @include('backend.include.emails.page-title')         <!-- end page title --> 
    @include('backend.include.emails.emailList')        <!-- end email list -->
    @include('backend.include.emails.emailDetails')    <!-- end email details -->
@endsection