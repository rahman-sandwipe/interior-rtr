@extends('layouts.app')
@section('title') Banners @endsection
@section('content')
    @include('backend.include.banners.page-title')  <!-- end page title --> 
    @include('backend.include.banners.bannerList')  <!-- end banner list -->
    @include('backend.include.banners.bannerDetails')  <!-- end banner form -->
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