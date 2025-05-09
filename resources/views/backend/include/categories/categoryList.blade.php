<div class="page-container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Categories</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">
                            <i class="ri-add-line me-1"></i>
                            <span>Add New</span>
                        </button>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="categoryTable">
                        <thead class="bg-light-subtle">
                            <tr>
                                <th class="text-uppercase text-muted">#ID</th>
                                <th class="text-uppercase text-muted">Image || Name</th>
                                <th class="text-uppercase text-muted">Status</th>
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

</div>
<script>
    // Category List
    $(document).ready(function() {
        $.ajax({
            url: '/api/categoryList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.categories.forEach(function(category) {
                    rows += `<tr>
                        <td>${category.id} || ${category.categoryID }</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="${category.image}" alt=""  class="img-fluid" width="60">
                                <h6 class="fs-14 mb-0">${category.name}</h6>
                            </div>
                        </td>
                        <td class="text-center text-capitalize" width="100">${category.status}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-category" data-id="${category.id}">View</button>
                            <button class="btn btn-primary btn-sm waves-effect waves-light edit-category" data-id="${category.id}">Edit</button>
                            <a href="/api/category-delete/${category.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#categoryTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching ctegories');
                console.error(err);
            }
        });
    });

    // View Category
    $(document).on('click', '.view-category', function() {
        var categoryId = $(this).data('id');
        $.ajax({
            url: '/api/getCategory/' + categoryId,
            method: 'GET',
            success: function(response) {
                $('#modalcategoryContent').html(`
                    <p><strong>category ID:</strong> ${response.categoryID }</p>
                    <p><strong>Name:</strong> ${response.name}</p>
                    <p><strong>Description:</strong> ${response.description}</p>
                    <div class="d-flex align-items-center">
                        <img src="${response.image}" alt="${response.name}" class="img-fluid" width="450">
                    </div>
                    <p><strong>Status:</strong> ${response.status}</p>
                `);
                var modal = new bootstrap.Modal(document.getElementById('categoryModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch category details.');
                console.error(err);
            }
        });
    });

    // Edit Category
    $(document).on('click', '.edit-category', function() {
        var categoryId = $(this).data('id');

        $.ajax({
            url: '/api/category-edit/' + categoryId,
            method: 'GET',
            success: function(response) {
                $('#editCategoryId').val(response.categoryID);
                $('#editName').val(response.name);
                $('#editDescription').val(response.description);
                $('#editStatus').val(response.status === 'active' ? 'active' : 'inactive');
                $('#currentImage').html(
                    `<img src="${response.image}" alt="${response.name}" class="img-fluid" width="150">`
                );

                var modal = new bootstrap.Modal(document.getElementById('editCategory'));
                modal.show();
            },
            error: function() {
                alert('Failed to fetch category details.');
            }
        });
    });
</script>
