@extends('layouts.guest')
@section('title', 'Contacts')
@section('content')
    @include('frontend.include.contacts.page-title') <!-- end page title section -->
    <section>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    @include('frontend.include.contacts.contact-details')
                </div>
    
                <div class="col-lg-6">
                    @include('frontend.include.contacts.contact-form')
                </div>
                
            </div>
        </div>
    </section>
@endsection