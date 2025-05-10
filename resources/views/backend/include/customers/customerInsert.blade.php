<div id="InsertCustomer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Insert New Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customerInsert') }}" method="POST" novalidate>
                    @csrf
                    <!-- Customer Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name..." class="form-control">
                    </div>

                    <!-- Customer Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter email..." class="form-control">
                    </div>

                    <!-- Customer Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Enter phone..." class="form-control">
                    </div>

                    <!-- Customer Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" placeholder="Enter Address..." class="form-control">
                    </div>

                    <!-- Customer Status -->
                    <div class="mb-3">
                        <label for="validationCustom02" class="form-label">Status</label>
                        <select class="form-select" id="validationCustom02" name="status" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="active"> Active</option>
                            <option value="inactive"> Inactive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">INSERT</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
