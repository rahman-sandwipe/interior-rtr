<!-- Add Inventory Modal -->
<div class="modal fade" id="addInventoryModal" tabindex="-1" aria-labelledby="addInventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInventoryModalLabel">Add New Inventory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('inventoryInsert') }}" method="POST">
                    @csrf
                    <!-- Products -->
                    <div class="mb-3" id="productSelect">
                        <label for="product_id" class="form-label">Products</label>
                        <select name="product_id" class="form-select" aria-label="Default select" required>
                            {{-- <option value="">Select Product</option> --}}
                        </select>
                    </div>
                    
                    <!-- Quantity -->
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    
                    <!-- type -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select name="type" class="form-select" aria-label="Default select" required>
                            <option value="">Select Type</option>
                            <option value="purchase">Purchase</option>
                            <option value="sale">Sale</option>
                            <option value="adjustment">Adjustment</option>
                            <option value="return">Return</option>
                        </select>
                    </div>

                    <!-- Remarks -->
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" id="remarks" name="remarks" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">INSERT</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
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
                $('#productSelect select').html(rows);
            },
            error: function(err) {
                alert('Error fetching products');
                console.error(err);
            }
        });
    });
</script>