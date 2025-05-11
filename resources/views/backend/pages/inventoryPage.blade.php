@extends('layouts.app')
@section('title', 'Inventory')
@section('content')
    @include('backend.include.inventories.pageTitle') <!-- end page title --> 
    @include('backend.include.inventories.inventoryList') <!-- end inventories list -->
    @include('backend.include.inventories.inventoryDetails') <!-- end inventories details -->
    @include('backend.include.inventories.inventoryForm') <!-- end inventories form -->
@endsection