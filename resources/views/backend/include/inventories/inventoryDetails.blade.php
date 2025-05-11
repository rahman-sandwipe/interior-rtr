<div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inventoryModalLabel">inventory Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalInventoryContent">
                <!-- inventory data will load here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.view-inventory', function() {
        var inventoryId = $(this).data('id');

        $.ajax({
            url: '/api/getInventory/' + inventoryId,
            method: 'GET',
            success: function(response) {
                $('#modalInventoryContent').html(`
                    <p><strong>Product ID:</strong> ${response.product.barcode }</p>
                    <p class="text-capitalize"><strong>Name:</strong> ${response.product.name}</p>
                    <p><strong>Remark:</strong> ${response.remarks}</p>
                    <p><strong>Quantity:</strong> ${response.quantity}</p>
                    <p><strong>Created At:</strong> ${new Date(response.created_at).toLocaleString()}</p>
                    <p><strong>Updated At:</strong> ${new Date(response.updated_at).toLocaleString()}</p>
                `);
                var modal = new bootstrap.Modal(document.getElementById('inventoryModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch inventory details.');
                console.error(err);
            }
        });
    });
</script>