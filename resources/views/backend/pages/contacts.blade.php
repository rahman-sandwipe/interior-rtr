@extends('layouts.app')
@section('title') Contacts @endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        @include('backend.include.contacts.page-title') <!-- end page title --> 

        @include('backend.include.contacts.contact-list') <!-- end contact list -->`

        @include('backend.include.contacts.contact-details') <!-- end contact details -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection