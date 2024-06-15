@extends('layouts.master')


@section('top')
    <!-- DataTables --> 
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">--}}
    @include('sweet::alert')
@endsection

@section('content')
    <div class="box box-success">

        <div class="box-header">
            <h3 class="box-title">List of Customers</h3>
        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-success" ><i class="fa fa-plus"></i> Add Customers</a>
            <a href="{{ route('exportPDF.customersAll') }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
            <a href="{{ route('exportExcel.customersAll') }}" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel</a>
        </div>


        <!-- /.box-header -->
        <div class="box-body">
            <table id="customer-table" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    @include('customers.form_import')

    @include('customers.form')

@endsection

@section('bot')

    <!-- DataTables -->
    <script src=" {{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }} "></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>--}}

    <script type="text/javascript">
    var table = $('#customer-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.customers') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'alamat', name: 'alamat'},
            {data: 'email', name: 'email'},
            {data: 'telepon', name: 'telepon'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Customers');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('customers') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Customers');

                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#alamat').val(data.alamat);
                $('#email').val(data.email);
                $('#telepon').val(data.telepon);
            },
            error : function(xhr, status, error) {
                console.error("Error: ", error);
                console.error("Status: ", status);
                console.dir(xhr);
                alert("Failed to fetch data. Please check the console for details.");
            }
        });
    }

    function deleteData(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            $.ajax({
                url : "{{ url('customers') }}" + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' : csrf_token},
                success : function(data) {
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: data.message,
                        type: 'success',
                        timer: '1500'
                    })
                },
                error : function (xhr, status, error) {
                    console.error("Error: ", error);
                    console.error("Status: ", status);
                    console.dir(xhr);
                    swal({
                        title: 'Oops...',
                        text: "Something went wrong! Please check the console for details.",
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
    }

    $(function(){
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('customers') }}";
                else url = "{{ url('customers') . '/' }}" + id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#modal-form form').serialize(),
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success : function(data) {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: data.message,
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function(xhr, status, error){
                        console.error("Error: ", error);
                        console.error("Status: ", status);
                        console.dir(xhr);
                        swal({
                            title: 'Oops...',
                            text: "Something went wrong! Please check the console for details.",
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
                return false;
            }
        });
    });
</script>

@endsection
