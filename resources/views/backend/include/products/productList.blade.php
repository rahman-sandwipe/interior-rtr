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
                                <th class="text-uppercase text-muted">#ID || Support ID</th>
                                <th class="text-uppercase text-muted">Name</th>
                                <th class="text-uppercase text-muted">Subject</th>
                                <th class="text-center text-uppercase text-muted" width="150">Action</th>
                            </tr>
                        </thead> <!-- end table-head -->

                        <tbody>
                            <!-- content -->
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <ul class="pagination mb-0 justify-content-center">
                            <li class="page-item disabled">
                                <a href="#" class="page-link"><i class="ri-arrow-left-double-line"></i></a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link"><i class="ri-arrow-right-double-line"></i></a>
                            </li>
                        </ul><!-- end pagination -->
                    </div><!-- end flex -->
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
                        <td>${product.id} || ${product.product_id}</td>
                        <td>${product.name}</td>
                        <td>${product.subject}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-product" data-id="${product.id}">View</button>
                            <a href="/product/${product.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
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

    $(document).on('click', '.view-product', function() {
        var productId = $(this).data('id');

        $.ajax({
            url: '/api/productDetails/' + productId,
            method: 'GET',
            success: function(response) {
                $('#modalproductContent').html(`
                    <p><strong>ID:</strong> ${response.id}</p>
                    <p><strong>product ID:</strong> ${response.product_id}</p>
                    <p><strong>Name:</strong> ${response.name}</p>
                    <p><strong>Product:</strong> ${response.product}</p>
                    <p><b>Message:</b> ${response.message}</p>
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
