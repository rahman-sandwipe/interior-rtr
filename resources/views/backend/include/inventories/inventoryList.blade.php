<div class="page-container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Inventories</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
                            <i class="ri-add-line me-1"></i>
                            Add New
                        </button>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="inventoryTable">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="text-uppercase text-muted">#ID || Barcode</th>
                                <th class="text-uppercase text-muted">Product Name</th>
                                <th class="text-uppercase text-muted">Quantity</th>
                                <th class="text-uppercase text-muted">Type</th>
                                <th class="text-uppercase text-muted">Remarks</th>
                                <th class="text-center text-uppercase text-muted" width="150">Action</th>
                            </tr>
                        </thead> <!-- end table-head -->

                        <tbody>
                            <!-- content -->
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div> <!-- container -->

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/inventoryList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.inventories.forEach(function(inventory) {
                    rows += `<tr>
                        <td>${inventory.id} || ${inventory.product.barcode}</td>
                        <td class="text-capitalize">${inventory.product.name || 'No Product Name'}</td>
                        <td>${inventory.quantity}</td>
                        <td>${inventory.type}</td>
                        <td>${inventory.remarks}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-inventory" data-id="${inventory.id}">View</button>
                            <button class="btn btn-primary btn-sm waves-effect waves-light edit-inventory" data-id="${inventory.id}">Edit</button>
                            <a href="/api/inventory-delete/${inventory.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#inventoryTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching inventories');
                console.error(err);
            }
        });
    });
</script>