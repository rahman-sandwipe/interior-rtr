
<!-- product Details Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="productContent">
                <!-- product data will load here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // View Product
    $(document).on('click', '.view-product', function() {
        var productId = $(this).data('id');
        $.ajax({
            url: '/api/getProduct/' + productId,
            method: 'GET',
            success: function(product) {
                $('#productContent').html(`
                <div class="row mt-2">
                    <div class="col-5">
                        <div class="d-flex align-items-center">
                            <img src="${product.image}" alt="${product.name}" class="img-fluid" width="450">
                            </div>
                        </div>
                        <div class="col-7">
                            <p><strong>Barcode:</strong> ${product.barcode }</p>
                            <p class="text-capitalize"><strong>Name:</strong> ${product.name}</p>
                            <p><strong>Description:</strong> ${product.description}</p>
                            <p><strong>Category:</strong> ${product.category?.name || 'No Category'}</p>
                            <p><strong>Supplier:</strong> ${product.supplier?.name || 'No Supplier'}</p>
                            <p><strong>Price:</strong> ${product.price}</p>
                            <p><strong>Quantity:</strong> ${product.quantity}</p>
                            <p class="text-capitalize"><strong>Status:</strong> ${product.status}</p>
                        </div>
                    </div>
                `);
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch product details.');
                console.error(err);
            }
        });
    });
</script>