<div class="page-container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Customers</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#InsertCustomer">
                            <i class="ri-add-line me-1"></i>
                            Add Customer
                        </button>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="customerTable">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="text-uppercase text-muted">#ID || Customer ID</th>
                                <th class="text-uppercase text-muted">Name</th>
                                <th class="text-uppercase text-muted">Email</th>
                                <th class="text-uppercase text-muted">Phone</th>
                                <th class="text-center text-uppercase text-muted">Status</th>
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
            url: '/api/customerList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.customers.forEach(function(customer) {
                    rows += `<tr>
                        <td>${customer.id} || ${customer.customer_id}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="${customer.avatar}" alt=""  class="img-fluid rounded-circle" width="40">
                                <h6 class="fs-14 mb-0">${customer.name}</h6>
                            </div>
                        </td>
                        <td>${customer.email}</td>
                        <td>${customer.phone}</td>
                        <td class="text-center text-capitalize" width="100">${customer.status}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-customer" data-id="${customer.id}">View</button>
                            <button class="btn btn-primary btn-sm waves-effect waves-light edit-customer" data-id="${customer.id}">Edit</button>
                            <a href="/customer-delete/${customer.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#customerTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching customers');
                console.error(err);
            }
        });
    });
</script>