@extends('layouts.app')
@section('title') Abouts @endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        @include('include.backend.abouts.title') <!-- end page title --> 

        <div class="card-box">
            @include('include.backend.abouts.abouts') <!-- end abouts -->
        </div> <!-- end card-box -->
    </div> <!-- end container-fluid -->
</div> <!-- end content -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Display image preview
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
        $("input[name='image']").change(function() {
            readURL(this);
        });
    });
</script>
@endsection