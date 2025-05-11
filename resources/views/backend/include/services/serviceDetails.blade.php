
<!-- Service Details Modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="ServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ServiceModalLabel">Service Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalServiceContent">
                <!-- Service data will load here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.view-service', function() {
        var serviceId = $(this).data('id');

        $.ajax({
            url: '/api/getService/' + serviceId,
            method: 'GET',
            success: function(response) {
                $('#modalServiceContent').html(`
                    <p><strong>service ID:</strong> ${response.service_id }</p>
                    <p><strong>Title:</strong> ${response.title}</p>
                    <p><strong>Description:</strong> ${response.description}</p>
                    <div class="d-flex align-items-center">
                        <img src="${response.img}" alt="${response.title}" class="img-fluid" width="450">
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <p><strong>Visibility:</strong> ${response.visibility}</p>
                        </div>
                        <div class="col-4">
                            <p><strong>Price:</strong> ${response.price}</p>
                        </div>
                        <div class="col-4">
                            <p><strong>Duration:</strong> ${response.duration}</p>
                        </div>
                    </div>
                `);
                var modal = new bootstrap.Modal(document.getElementById('serviceModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch service details.');
                console.error(err);
            }
        });
    });
</script>