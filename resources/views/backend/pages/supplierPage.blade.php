@extends('layouts.app')
@section('title', 'Suppliers')
@section('content')
    @include('backend.include.suppliers.pageTitle') <!-- end page title --> 
    @include('backend.include.suppliers.supplierForm') <!-- end suppliers form -->
    
    <!-- Suppliers List -->
    @include('backend.include.suppliers.supplierList') <!-- end suppliers list -->
    
    <!-- View Supplier -->
    @include('backend.include.suppliers.supplierDetails') <!-- end suppliers details -->
    
    <!-- Edit Supplier -->
    
    @include('backend.include.suppliers.supplierEdit') <!-- end suppliers form -->
@endsection