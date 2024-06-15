<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Import Customer Data</h3>
                <br><br>
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible ">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-check"></i> Success!&nbsp;
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fa fa-ban"></i> Error!&nbsp;
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  action="<?php echo e(route('import.customers')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputFile" >
                            Input File
                        </label>
                        <input type="file" id="file" name="file">
                        <p class="text-danger"><?php echo e($errors->first('file')); ?></p>
                    </div>
                </div>


                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                <div class="box-body">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-warning"></i> Attention! &nbsp;
                    File Data Customer Only Type (.xls, .xlsx)
                </div>
                </div>
            </form>
        </div>


        <!-- /.box -->
    </div>

</div>
<?php /**PATH C:\Users\Sahin\Desktop\InventorySimcoGroup\resources\views/customers/form_import.blade.php ENDPATH**/ ?>