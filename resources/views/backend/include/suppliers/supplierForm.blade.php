<div id="insertSupplier" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Insert New Supplier</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('supplierInsert') }}" method="POST" class="row novalidate">
                    @csrf
                    <div class="col-3 mb-3">
                        <label for="companyInput" class="form-label">Company Name</label>
                        <input type="text" name="company" id="companyInput" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <div class="col-3 mb-3">
                        <label for="name" class="form-label">Person Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <div class="col-3 mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="text" name="email" id="emailInput" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <div class="col-3 mb-3">
                        <label for="phoneInput" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phoneInput" placeholder="Enter Here..." class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    
                    <div class="col-9 mb-3">
                        <label for="addressInput" class="form-label">Address</label>
                        <input type="text" name="address" id="addressInput" placeholder="Enter address" class="form-control">
                        <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <div class="col-3 mb-3">
                        <label class="form-label" for="validationCustom02">Category Status</label>
                        <select class="form-select" name="status" id="validationCustom02" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">INSERT</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
