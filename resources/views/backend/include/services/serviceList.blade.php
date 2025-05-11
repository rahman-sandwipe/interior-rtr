<div class="page-container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Services</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">Add New</button>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="serviceTable">
                        <thead class="bg-light-subtle" >
                            <tr>
                                <th class="text-uppercase text-muted">#ID || service ID</th>
                                <th class="text-uppercase text-muted">Title</th>
                                <th class="text-uppercase text-muted">Visibility</th>
                                <th class="text-center text-uppercase text-muted" width="150">Action</th>
                            </tr>
                        </thead>    <!-- end table-head -->

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
            url: '/api/getServices',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.services.forEach(function(service) {
                    rows += `<tr>
                        <td>${service.id} || ${service.service_id }</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="${service.img}" alt="${service.title}"  class="img-fluid" width="60">
                                <h6 class="fs-14 mb-0">${service.title}</h6>
                            </div>
                        </td>
                        <td class="text-center text-capitalize" width="100">${service.visibility}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-service" data-id="${service.id}">View</button>
                            <a href="/service/${service.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#serviceTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching services');
                console.error(err);
            }
        });
    });
</script>
