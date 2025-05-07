<div class="card">
    <div class="card-header border-bottom border-dashed d-flex align-items-center">
        <h4 class="header-title">Bordered Color Table</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-bordered border-secondary mb-0" id="contactTable">
                <thead>
                    <tr>
                        <th>ID || Contact ID</th>
                        <th>Name</th>
                        <th>Msg. Subject</th>
                        <th class="text-center" width="150">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div> <!-- end table-responsive-->
    </div> <!-- end card body-->
</div> <!-- end card -->

<script>
    $(document).ready(function() {
        $.ajax({
            url: '/api/contactList',
            method: 'GET',
            success: function(response) {
                let rows = '';
                response.contacts.forEach(function(contact) {
                    rows += `<tr>
                        <td>${contact.id} || ${contact.contact_id}</td>
                        <td>${contact.name}</td>
                        <td>${contact.subject}</td>
                        <td class="text-center" width="150">
                            <button class="btn btn-primary btn-sm waves-effect waves-light view-contact" data-id="${contact.id}">View</button>
                            <a href="/contact/${contact.id}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                        </td>
                    </tr>`;
                });
                $('#contactTable tbody').html(rows);
            },
            error: function(err) {
                alert('Error fetching contacts');
                console.error(err);
            }
        });
    });
    
    $(document).on('click', '.view-contact', function() {
        var contactId = $(this).data('id');

        $.ajax({
            url: '/api/contactDetails/' + contactId,
            method: 'GET',
            success: function(response) {
                $('#modalContactContent').html(`
                    <p><strong>ID:</strong> ${response.id}</p>
                    <p><strong>Message ID:</strong> ${response.contact_id}</p>
                    <p><strong>Name:</strong> ${response.name}</p>
                    <p><strong>Email:</strong> ${response.email}</p>
                    <p><b>Message:</b> ${response.message}</p>
                `);
                var modal = new bootstrap.Modal(document.getElementById('contactModal'));
                modal.show();
            },
            error: function(err) {
                alert('Failed to fetch contact details.');
                console.error(err);
            }
        });
    });
</script>
