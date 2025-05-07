@extends('layouts.guest')
@section('title', 'Contacts')
@section('content')
    @include('frontend.include.contacts.pageTitle') <!-- end page title section -->
    <section>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    @include('frontend.include.contacts.contactDetails')
                </div>
    
                <div class="col-lg-6">
                    @include('frontend.include.contacts.emailSend')
                </div>
            </div>
        </div>
    </section>
@endsection