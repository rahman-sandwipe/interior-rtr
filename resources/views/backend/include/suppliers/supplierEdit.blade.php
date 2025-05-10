
<div class="modal fade" id="editSupplier" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supplierModalLabel">Edit Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSupplierForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="editSupplierId">

                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" name="name" id="editName" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="text" name="email" id="editEmail" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="editPhone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" name="address" id="editAddress" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-10 mb-3">
                            <label for="editAvatar" class="form-label">Avatar</label>
                            <input type="file" name="logo" id="editAvatar" class="form-control">
                        </div>
                        <div class="col-2 mb-3">
                            <div id="currentAvatar" class="mt-2">
                                <!-- Avatar image preview will go here -->
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select name="status" id="editStatus" class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 ">
                            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.edit-supplier', function() {
        var supplierId = $(this).data('id');
        $.ajax({
            url: '/api/supplier-edit/' + supplierId,
            method: 'GET',
            success: function(response) {
                $('#editsupplierId').val(response.supplierID);
                $('#editName').val(response.name);
                $('#editEmail').val(response.email);
                $('#editPhone').val(response.phone);
                $('#editAddress').val(response.address);
                $('#editStatus').val(response.status);
                $('#currentAvatar').html(
                    `<img src="${response.logo}" alt="Avatar" class="img-fluid rounded" width="120">`
                );
                // Set form action dynamically
                $('#editSupplierForm').attr('action', '/api/supplier-update/' + supplierId);

                var modal = new bootstrap.Modal(document.getElementById('editSupplier'));
                modal.show();
            },
            error: function() {
                alert('Failed to fetch supplier details.');
            }
        });
    });
</script>
