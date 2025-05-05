<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Insert New Banner</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Banner Title" required>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Sub Title</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Banner Sub Title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="btn_link"> Button Link</label>
                        <input type="text" class="form-control" id="btn_link" name="btn_link" placeholder="Enter Button Link" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Banner Description" required></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-9">
                            <label for="Banner_image">Image</label>
                            <input type="file" class="form-control" id="Banner_image" name="image" required>
                        </div>
                        <div class="col-3">
                            <div class="preview"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select" id="status" name="status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="visible"> Visible</option>
                            <option value="hidden"> Hidden</option>
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
