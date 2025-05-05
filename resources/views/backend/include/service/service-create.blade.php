<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Insert New Service</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Service Title" required>
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter Service Duration" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="starting_price">Starting Price</label>
                        <input type="text" class="form-control" id="starting_price" name="starting_price" placeholder="Enter Service Starting Price" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Service Description" required></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-9">
                            <label for="service_image">Image</label>
                            <input type="file" class="form-control" id="service_image" name="img" required>
                        </div>
                        <div class="col-3">
                            <div class="preview"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <select class="custom-select" id="visibility" name="visibility" required>
                            <option value="" disabled selected>Select Visibility</option>
                            <option value="public"> Public</option>
                            <option value="private"> Private</option>
                        </select>
                    </div> 
                    
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
