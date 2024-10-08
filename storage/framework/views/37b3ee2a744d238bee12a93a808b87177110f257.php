<?php $__env->startSection('top'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/components/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-success">

        <div class="box-header">
            <h3 class="box-title">Purchase Products List</h3>


        </div>

        <div class="box-header">
            <a onclick="addForm()" class="btn btn-success" ><i class="fa fa-plus"></i> Add New Purchase</a>
            <a href="<?php echo e(route('exportPDF.productMasukAll')); ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
            <a href="<?php echo e(route('exportExcel.productMasukAll')); ?>" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Export Excel</a>
        </div>




        <!-- /.box-header -->
        <div class="box-body">
            <table id="products-in-table" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Products</th>
                    <th>Supplier</th>
                    <th>Qty.</th>
                    <th>In Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box box-success col-md-6">

        <div class="box-header">
            <h3 class="box-title">Export Invoice</h3>
        </div>

    
    
    
    
    

    <!-- /.box-header -->
        <div class="box-body">
            <table id="invoice" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Products</th>
                    <th>Supplier</th>
                    <th>Qty.</th>
                    <th>In Date</th>
                    <th>Action</th>
                </tr>
                </thead>

                <?php $__currentLoopData = $invoice_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                    <td><?php echo e($i->id); ?></td>
                    <td><?php echo e($i->product->nama); ?></td>
                    <td><?php echo e($i->supplier->nama); ?></td>
                    <td><?php echo e($i->qty); ?></td>
                    <td><?php echo e($i->tanggal); ?></td>
                    <td>
                        <a href="<?php echo e(route('exportPDF.productMasuk', [ 'id' => $i->id ])); ?>" class="btn btn-sm btn-danger">Export Invoice</a>
                    </td>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <?php echo $__env->make('product_masuk.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bot'); ?>

    <!-- DataTables -->
    <script src=" <?php echo e(asset('assets/components/datatables.net/js/jquery.dataTables.min.js')); ?> "></script>
    <script src="<?php echo e(asset('assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?> "></script>


    <!-- InputMask -->
    <script src="<?php echo e(asset('assets/plugins/input-mask/jquery.inputmask.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/input-mask/jquery.inputmask.extensions.js')); ?>"></script>
    <!-- date-range-picker -->
    <script src="<?php echo e(asset('assets/components/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo e(asset('assets/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo e(asset('assets/components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo e(asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/validator/validator.min.js')); ?>"></script>

    <script>
        $(function () {

            //Date picker
            $('#tanggal').datepicker({
                autoclose: true,
                // dateFormat: 'yyyy-mm-dd'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>

    <script type="text/javascript">
        var table = $('#products-in-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('api.productsIn')); ?>",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'products_name', name: 'products_name'},
                {data: 'supplier_name', name: 'supplier_name'},
                {data: 'qty', name: 'qty'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add New Purchase');
        }

        function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "<?php echo e(url('productsIn')); ?>" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Products In');

                    $('#id').val(data.id);
                    $('#product_id').val(data.product_id);
                    $('#supplier_id').val(data.supplier_id);
                    $('#qty').val(data.qty);
                    $('#tanggal').val(data.tanggal);
                },
                error : function() {
                    alert("Nothing Data");
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
                    url : "<?php echo e(url('productsIn')); ?>" + '/' + id,
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
                            text: data.message,
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
                    if (save_method == 'add') url = "<?php echo e(url('productsIn')); ?>";
                    else url = "<?php echo e(url('productsIn') . '/'); ?>" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        //hanya untuk input data tanpa dokumen
//                      data : $('#modal-form form').serialize(),
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
                                text: data.message,
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Downloads\2PGM-Cinar-Sahin-SimcoGroupInventaris\2PGM-Cinar-Sahin-SimcoGroupInventaris\inventorySimcogroup\resources\views/product_masuk/index.blade.php ENDPATH**/ ?>