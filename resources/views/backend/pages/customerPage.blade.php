@extends('layouts.app')
@section('title', 'Customers')
@section('content')
    @include('backend.include.customers.pageTitle') <!-- end page title --> 
    @include('backend.include.customers.customerList') <!-- end customer list -->
    @include('backend.include.customers.customerDetails') <!-- end customer details -->
    @include('backend.include.customers.customerInsert') <!-- end customer form -->
    @include('backend.include.customers.customerEdit') <!-- end customer form -->
@endsection