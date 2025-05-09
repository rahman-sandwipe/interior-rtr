<div id="addCategoryModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Insert New Category</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="{{ route('categoryInsert') }}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Category Name</label>
                                <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Category Name" value="" required>
                                <div class="valid-feedback"> Looks good! </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Category Status</label>
                                <select class="form-select" name="status" id="validationCustom02" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <div class="valid-feedback"> Looks good! </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Category Description</label>
                                <textarea name="description" name="description" class="form-control" id="validationCustom02" placeholder="Category Description" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Category Image</label>
                                <input type="file" name="image" class="form-control" id="validationCustom02" placeholder="Category Image" value="" required>
                            </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button class="btn btn-primary" type="submit">INSERT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>