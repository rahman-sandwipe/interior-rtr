@extends('layouts.app')
@section('title', 'Products')
@section('content')
    @include('backend.include.products.pageTitle') <!-- end page title --> 
    @include('backend.include.products.productList') <!-- end product list -->
    @include('backend.include.products.productDetails') <!-- end product details -->
    @include('backend.include.products.productForm') <!-- end product form -->
@endsection