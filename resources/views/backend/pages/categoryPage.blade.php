@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    @include('backend.include.categories.pageTitle') <!-- end page title --> 
    @include('backend.include.categories.categoryList') <!-- end category list -->
    @include('backend.include.categories.categoryDetails') <!-- end category details -->
    @include('backend.include.categories.categoryInsert') <!-- end category form -->
    @include('backend.include.categories.categoryEdit') <!-- end category form -->
@endsection