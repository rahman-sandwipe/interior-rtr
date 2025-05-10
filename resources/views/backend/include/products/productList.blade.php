<div class="page-container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Products</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            <i class="ri-add-line me-1"></i>
                            Add Products
                        </button>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="productTable">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="text-uppercase text-muted">#ID || Barcode</th>
                                <th class="text-uppercase text-muted">Title</th>
                                <th class="text-uppercase text-muted">Category</th>
                                <th class="text-uppercase text-muted">Supplier</th>
                                <th class="text-uppercase text-muted">Qut</th>
                                <th class="text-uppercase text-muted">Price</th>
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
            url: '/api/productList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.products.forEach(function(product) {
                    rows += `<tr>
                        <td>${product.id} || ${product.barcode}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="${product.image}" alt=""  class="img-fluid rounded" width="60">
                                <h6 class="fs-14 mb-0">${product.name}</h6>
                            </div>
                        </td>
                        <td>${product.category?.name || 'No Category'}</td>
                        <td>${product.supplier?.name || 'No Supplier'}</td>
                        <td>${product.quantity}</td>
                        <td>${product.price}</td>
                        <td class="text-center text-capitalize" width="100">${product.status}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-product" data-id="${product.id}">View</button>
                            <a href="/product-delete/${product.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#productTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching products');
                console.error(err);
            }
        });
    });
</script>