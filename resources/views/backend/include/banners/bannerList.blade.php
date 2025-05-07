<div class="page-container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Banners</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        <a href="{{ route('banner.create') }}" class="btn btn-primary">
                            <i class="ri-add-line me-1"></i>
                            Add New
                        </a>
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive p-2">
                    <table class="table table-hover text-nowrap" id="bannerTable">
                        <thead class="bg-light-subtle" >
                            <tr>
                                <th class="text-uppercase text-muted">#ID || Banner ID</th>
                                <th class="text-uppercase text-muted">Title</th>
                                <th class="text-uppercase text-muted">Status</th>
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

</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/bannerList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.banners.forEach(function(banner) {
                    rows += `<tr>
                        <td>${banner.id} || ${banner.bannerID }</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="${banner.image}" alt=""  class="img-fluid" width="60">
                                <h6 class="fs-14 mb-0">${banner.title}</h6>
                            </div>
                        </td>
                        <td class="text-center text-capitalize" width="100">${banner.status}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-banner" data-id="${banner.id}">View</button>
                            <a href="/banner/${banner.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#bannerTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching banners');
                console.error(err);
            }
        });
    });

    $(document).on('click', '.view-banner', function() {
        var bannerId = $(this).data('id');

        $.ajax({
            url: '/api/bannerDetails/' + bannerId,
            method: 'GET',
            success: function(response) {
                $('#modalbannerContent').html(`
                    <p><strong>Banner ID:</strong> ${response.bannerID }</p>
                    <p><strong>Title:</strong> ${response.title}</p>
                    <p><strong>Subtitle:</strong> ${response.subtitle}</p>
                    <p><strong>Description:</strong> ${response.description}</p>
                    <div class="d-flex align-items-center">
                        <img src="${response.image}" alt="${response.title}" class="img-fluid" width="450">
                    </div>
                    <p><strong>Status:</strong> ${response.status}</p>
                    <a href="${response.btn_link}" class="btn btn-danger btn-sm waves-effect waves-light">Redirect Link</a>
                `);
                var modal = new bootstrap.Modal(document.getElementById('bannerModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch banner details.');
                console.error(err);
            }
        });
    });
</script>
