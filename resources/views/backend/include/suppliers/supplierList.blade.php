<div class="page-container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Suppliers</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertSupplier">Add New</button>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="supplierTable">
                        <thead class="bg-light-subtle" >
                            <tr>
                                <th class="text-uppercase text-muted">#ID || supplier ID</th>
                                <th class="text-uppercase text-muted">Name</th>
                                <th class="text-uppercase text-muted">Email</th>
                                <th class="text-uppercase text-muted">Phone</th>
                                <th class="text-center text-uppercase text-muted">Status</th>
                                <th class="text-center text-uppercase text-muted" width="150">Action</th>
                            </tr>
                        </thead>    <!-- end table-head -->

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
            url: '/api/supplierList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.suppliers.forEach(function(supplier) {
                    rows += `<tr>
                        <td>${supplier.id} || ${supplier.supplierID }</td>
                        <td>${supplier.name}</td>
                        <td>${supplier.email}</td>
                        <td>${supplier.phone}</td>
                        <td class="text-center text-capitalize" width="100">${supplier.status}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light edit-supplier" data-id="${supplier.id}">Edit</button>
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-supplier" data-id="${supplier.id}">View</button>
                            <a href="/api/supplier-delete/${supplier.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#supplierTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching suppliers');
                console.error(err);
            }
        });
    });
</script>