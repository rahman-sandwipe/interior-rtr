
<div class="modal fade" id="editinventory" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventoryModalLabel">Edit inventory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editInventoryForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="invId">

                    <!-- Products -->
                    <div class="mb-3" id="editProductSelect">
                        <label for="product_id" class="form-label">Products</label>
                        <select name="product_id" class="form-select" id="editProduct" aria-label="Default select" required>
                            <!-- Select Product -->
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label for="editQuantity" class="form-label">Quantity</label>
                        <input type="text" name="name" id="editQuantity" class="form-control">
                    </div>

                    <!-- Remarks -->
                    <div class="mb-3">
                        <label for="editRemarks" class="form-label">Remarks</label>
                        <input type="text" name="remarks" id="editRemarks" class="form-control">
                    </div>

                    <!-- Type -->
                    <div class="mb-3">
                        <label for="editType" class="form-label">Type</label>
                        <select name="type" class="form-select" id="editType">
                            <option value="purchase">Purchase</option>
                            <option value="sale">Sale</option>
                            <option value="adjustment">Adjustment</option>
                            <option value="return">Return</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-sm w-100">UPDATE</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary btn-sm w-100" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.edit-inventory', function() {
        var invId = $(this).data('id');
        $.ajax({
            url: '/api/inventory-edit/' + invId,
            method: 'GET',
            success: function(response) {
                $('#editInventoryId').val(response.invId);
                $('#editQuantity').val(response.quantity);
                $('#editRemarks').val(response.remarks);
                $('#editType').val(response.type).change();
                $('#editProduct').val(response.product_id).change();
                // Set form action dynamically
                $('#editInventoryForm').attr('action', '/api/inventory-update/' + invId);
                var modal = new bootstrap.Modal(document.getElementById('editinventory'));
                modal.show();
            },
            error: function() {
                alert('Failed to fetch inventory details.');
            }
        });

        $.ajax({
            url: '/api/productList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                rows += `<option value="">Select Product</option>`;
                response.products.forEach(function(product) {
                    rows += `
                        <option value="${product.id}">${product.name}</option>
                    `;
                });
                $('#editProductSelect select').html(rows);
            },
            error: function(err) {
                alert('Error fetching products');
                console.error(err);
            }
        });
    });
</script>
