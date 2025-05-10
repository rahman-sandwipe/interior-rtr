<!-- customer Details Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModalLabel">customer Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="customerContent">
                <!-- customer data will load here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // View customer
    $(document).on('click', '.view-customer', function() {
        var customerId = $(this).data('id');
        $.ajax({
            url: '/api/getCustomer/' + customerId,
            method: 'GET',
            success: function(response) {
                $('#customerContent').html(`
                <div class="row mt-2">
                    <div class="col-5">
                        <div class="d-flex align-items-center">
                            <img src="${response.avatar}" alt="${response.name}" class="img-fluid" width="180">
                        </div>
                    </div>
                    <div class="col-7">
                        <p class="text-uppercase"><strong>Customer ID:</strong> ${response.customer_id || 'No Customer ID' }</p>
                        <p class="text-capitalize"><strong>Name:</strong> ${response.name || 'No Name'}</p>
                        <p class="text-capitalize"><strong>Phone:</strong> ${response.phone || 'No Phone'}</p>
                        <p class="text-capitalize"><strong>Email:</strong> ${response.email || 'No Category'}</p>
                        <p class="text-capitalize"><strong>Status:</strong> ${response.status}</p>
                    </div>
                    <div class="col-12">
                        <p class="text-capitalize"><strong>Address:</strong> ${response.address || 'No Address'}</p>
                    </div>
                </div>
                `);
                var modal = new bootstrap.Modal(document.getElementById('customerModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch customer details.');
                console.error(err);
            }
        });
    });
</script>