@extends('layouts.app')
@section('title', 'Suppliers')
@section('content')
    @include('backend.include.suppliers.pageTitle') <!-- end page title --> 
    @include('backend.include.suppliers.supplierList') <!-- end product list -->
    @include('backend.include.suppliers.supplierDetails') <!-- end product details -->
    @include('backend.include.suppliers.supplierForm') <!-- end product form -->
@endsection