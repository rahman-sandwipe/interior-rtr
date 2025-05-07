<div id="insertModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Insert New Service</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('serviceInsert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Title</label>
                        <input type="text" name="title" id="simpleinput" placeholder="Enter Title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" placeholder="Enter Description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Starting Price</label>
                        <input type="text" name="price" id="price" placeholder="Enter price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration" id="duration" placeholder="Enter duration" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="visibility">Visibility</label>
                        <select class="form-select" id="visibility" name="visibility" required>
                            <option value="" disabled selected>Select Visibility</option>
                            <option value="public"> Public</option>
                            <option value="private"> private</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="img" id="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">INSERT</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
