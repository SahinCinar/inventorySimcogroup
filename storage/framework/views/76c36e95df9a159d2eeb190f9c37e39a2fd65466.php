<?php $__env->startSection('top'); ?>
    <!-- DataTables --> 
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Data Sales</h3>
        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-primary" >Add Customers</a>
            <a href="<?php echo e(route('exportPDF.salesAll')); ?>" class="btn btn-danger">Export PDF</a>
            <a href="<?php echo e(route('exportExcel.salesAll')); ?>" class="btn btn-success">Export Excel</a>
        </div>


        <!-- /.box-header -->
        <div class="box-body">
            <table id="sales-table" class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div> 
        <!-- /.box-body -->
    </div>

    <?php echo $__env->make('sales.form_import', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('sales.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bot'); ?>

    <!-- DataTables -->
    <script src=" <?php echo e(asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?> "></script>
    <script src="<?php echo e(asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?> "></script>

    
    <script src="<?php echo e(asset('assets/validator/validator.min.js')); ?>"></script>

    <script type="text/javascript">
    var table = $('#sales-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('api.sales')); ?>",
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
        $('.modal-title').text('Add Sales');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "<?php echo e(url('sales')); ?>" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Sales');

                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#alamat').val(data.alamat);
                $('#email').val(data.email);
                $('#telepon').val(data.telepon);
            },
            error: function() {
                alert("Data not found!");
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
                url : "<?php echo e(url('sales')); ?>" + '/' + id,
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
                error : function () {
                    swal({
                        title: 'Oops...',
                        text: 'Something went wrong!',
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
                if (save_method == 'add') url = "<?php echo e(url('sales')); ?>";
                else url = "<?php echo e(url('sales') . '/'); ?>" + id;

                $.ajax({
                    url : url,
                    type : "POST",
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
                    error : function(data){
                        swal({
                            title: 'Oops...',
                            text: 'Something went wrong!',
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/sales/index.blade.php ENDPATH**/ ?>