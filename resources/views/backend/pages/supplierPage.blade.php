@extends('layouts.app')
@section('title', 'Suppliers')
@section('content')
    @include('backend.include.suppliers.pageTitle') <!-- end page title --> 
    @include('backend.include.suppliers.supplierForm') <!-- end suppliers form -->
    
    <!-- Suppliers List -->
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
                            <td>${supplier.company}</td>
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
    @include('backend.include.suppliers.supplierList') <!-- end suppliers list -->
    
    <!-- View Supplier -->
    <script>
        $(document).on('click', '.view-supplier', function() {
            var supplierId = $(this).data('id');
            $.ajax({
                url: '/api/getSupplier/' + supplierId,
                method: 'GET',
                success: function(response) {
                    $('#supplierContent').html(`
                        <p><strong>Supplier ID:</strong> ${response.supplierID }</p>
                        <p><strong>Company:</strong> ${response.company}</p>
                        <p><strong>Name:</strong> ${response.name}</p>
                        <p><strong>Email:</strong> ${response.email}</p>
                        <p><strong>Phone:</strong> ${response.phone}</p>
                        <p class="text-capitalize"><strong>Status:</strong> ${response.status}</p>
                    `);
                    var modal = new bootstrap.Modal(document.getElementById('supplierModal'));
                    modal.show();
                },
                error: function(err) {
                    alert('Failed to fetch supplier details.');
                    console.error(err);
                }
            });
        });
    </script>
    @include('backend.include.suppliers.supplierDetails') <!-- end suppliers details -->
    
    <!-- Edit Supplier -->
    <script>
        $(document).on('click', '.edit-supplier', function() {
            var supId = $(this).data('id');
            $.ajax({
                url: '/api/supplier-edit/' + supId,
                method: 'GET',
                success: function(response) {
                    $('#Editcompany').val(response.company);
                    $('#Editname').val(response.name);
                    $('#Editemail').val(response.email);
                    $('#Editphone').val(response.phone);
                    $('#Editstatus').val(response.status);
                    var modal = new bootstrap.Modal(document.getElementById('editSupplier'));
                    modal.show();
                },
                error: function(err) {
                    alert('Failed to fetch supplier details.');
                    console.error(err);
                }
            });
        });
    </script>
    @include('backend.include.suppliers.supplierEdit') <!-- end suppliers form -->
@endsection