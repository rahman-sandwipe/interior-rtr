@extends('layouts.app')
@section('title') Services @endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        @include('backend.include.banners.title') <!-- end page title --> 

        <div class="card-box">
            <div class="card-header">
                <div class="header-title">
                    Service List
                    <!-- Large modal -->
                    <button type="button" class="btn btn-success waves-effect waves-light float-right" data-toggle="modal" data-target=".bs-example-modal-lg">Insert New</button>
                    @include('backend.include.banners.create') <!-- end banner create modal -->
                    <!-- /.modal -->
                </div>
            </div>
            
            @include('backend.include.banners.banners')
        </div>
    </div>
</div>
<!-- end content -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Display img preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var html = '<div class="preview-image border"><img width="100" src="' + e.target.result + '"></div>';
                    $('.preview').append(html);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // Trigger image preview when file input changes
        $("input[name='img']").change(function() {
            readURL(this);
        });
    });
</script>
@endsection