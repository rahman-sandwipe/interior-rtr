
<!-- supplier Details Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="SupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="supplierModalLabel">Supplier Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="supplierContent">
                <!-- supplier data will load here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.view-supplier', function() {
        var supplierId = $(this).data('id');
        $.ajax({
            url: '/api/getSupplier/' + supplierId,
            method: 'GET',
            success: function(response) {
                $('#supplierContent').html(`
                <div class="row">
                    <div class="col-3">
                        <div class="d-flex align-items-center">
                            <img src="${response.logo}" alt="${response.company || 'No Company'}" class="img-fluid" >
                        </div>
                    </div>
                    <div class="col-9">
                        <p class="text-uppercase"><strong>supplier ID:</strong> ${response.supplierID || 'No Supplier ID' }</p>
                        <p class="text-capitalize"><strong>Name:</strong> ${response.name || 'No Name'}</p>
                        <p class="text-capitalize"><strong>Phone:</strong> ${response.phone || 'No Phone'}</p>
                        <p class="text-capitalize"><strong>Email:</strong> ${response.email || 'No Email'}</p>
                        <p class="text-capitalize"><strong>Status:</strong> ${response.status}</p>
                    </div>
                    <div class="col-12">
                        <p class="text-capitalize"><strong>Address:</strong> ${response.address || 'No Address'}</p>
                    </div>
                </div>
                `);
                var modal = new bootstrap.Modal(document.getElementById('supplierModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch supplier details.');
                console.error(err);
            }
        });
    });
    </script>