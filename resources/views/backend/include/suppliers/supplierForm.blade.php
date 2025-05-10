<div id="insertSupplier" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Insert New Supplier</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supplierInsert') }}" method="POST" class="novalidate" enctype="multipart/form-data">
                    @csrf

                    <!-- Company Name -->
                    <div class="mb-3">
                        <label for="companyInput" class="form-label">Company Name</label>
                        <input type="text" name="company" id="companyInput" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <!-- Company Logo -->
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom02">Company Logo</label>
                        <input class="form-control" type="file" name="logo" id="validationCustom02">
                    </div>

                    <!-- Person Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Person Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="text" name="email" id="emailInput" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phoneInput" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phoneInput" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <!-- Address -->
                    <div class="mb-3">
                        <label for="addressInput" class="form-label">Address</label>
                        <input type="text" name="address" id="addressInput" placeholder="Enter address" class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label" for="validationCustom02">Status</label>
                        <select class="form-select" name="status" id="validationCustom02" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">INSERT</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
