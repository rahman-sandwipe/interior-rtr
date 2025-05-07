<div class="page-container">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom card-tabs d-flex flex-wrap align-items-center gap-2">
                    <div class="flex-grow-1">
                        <h4 class="header-title">Emails</h4>
                    </div>

                    <div class="d-flex flex-wrap flex-lg-nowrap gap-2">
                        <div class="flex-shrink-0 d-flex align-items-center gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control ps-4" placeholder="Search Here...">
                                <i class="ri-search-line position-absolute top-50 translate-middle-y start-0 ms-2"></i>
                            </div>
                        </div>
                        {{-- <a href="apps-invoice-create.html" class="btn btn-primary">
                            <i class="ri-add-line me-1"></i>
                            Add emails
                        </a> --}}
                    </div><!-- end d-flex -->
                </div>

                <div class="table-responsive">
                    <table class="table table-hover text-nowrap" id="emailTable">
                        <thead class="bg-light-subtle" >
                            <tr>
                                <th class="text-uppercase text-muted">#ID || Support ID</th>
                                <th class="text-uppercase text-muted">Name</th>
                                <th class="text-uppercase text-muted">Subject</th>
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
            url: '/api/emailList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.emails.forEach(function(email) {
                    rows += `<tr>
                        <td>${email.id} || ${email.contact_id}</td>
                        <td>${email.name}</td>
                        <td>${email.subject}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-email" data-id="${email.id}">View</button>
                            <a href="/email/${email.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#emailTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching emails');
                console.error(err);
            }
        });
    });

    $(document).on('click', '.view-email', function() {
        var emailId = $(this).data('id');

        $.ajax({
            url: '/api/emailDetails/' + emailId,
            method: 'GET',
            success: function(response) {
                $('#modalemailContent').html(`
                    <p><strong>ID:</strong> ${response.id}</p>
                    <p><strong>Message ID:</strong> ${response.contact_id}</p>
                    <p><strong>Name:</strong> ${response.name}</p>
                    <p><strong>Email:</strong> ${response.email}</p>
                    <p><b>Message:</b> ${response.message}</p>
                `);
                var modal = new bootstrap.Modal(document.getElementById('emailModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch email details.');
                console.error(err);
            }
        });
    });
</script>
