
<div class="row">
    <div class="col-12">
        <form action="{{ route('abouts.index') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" value="{{ $abouts->title }}" name="title" placeholder="Enter Title" required>
            </div>      <!-- end form-group -->
            
            <div class="form-group">
                <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{!! $abouts->description !!}</textarea>
            </div>      <!-- end form-group -->

            <div class="form-group">
                <label for="vision"> Vision</label>
                <textarea name="vision" id="vision" class="form-control" required>{!! $abouts->vision !!}</textarea>
            </div>      <!-- end form-group -->

            <div class="form-group">
                <label for="mission"> Mission</label>
                <textarea name="mission" id="mission" class="form-control" required>{!! $abouts->mission !!}</textarea>
            </div>      <!-- end form-group -->
            

            <div class="form-group row">
                <div class="col-9">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <div class="col-3 row">
                    <div class="col-6">
                        <div class="preview"></div>
                    </div>
                    <div class="col-6">
                        <img src="{{ asset($abouts->image) }}" alt="Image" class="img-fluid" width="100">
                    </div>    
                </div>
            </div>    <!-- end form-group -->
            
            <div class="form-group row">
                <div class="col-9">
                    <label for="video">Video</label>
                    <input type="file" class="form-control" id="video" name="video" required>
                </div>
                <div class="col-3">
                    <div class="preview-video"></div>
                </div>
            </div>    <!-- end form-group -->

            <div class="submit-section">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div> <!-- end col -->
</div>