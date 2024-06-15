<?php $__env->startSection('top'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of Countries</h3>
                    </div>
                    <div class="col-sm-4 text-right">
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addCountry">
                            <i  class="fa fa-plus"></i> Add New Country
                        </button>
                        <a href="#" onclick="window.print();" class="btn btn-primary">
                                <i class="fa fa-print"></i> Print Page
                            </a>
                    </div>
                </div>
            </div>    
            <!-- /.box-header -->
            
                <br>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <table class="table table-bordered table-hover table-striped" id="countries-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr role="row" class="odd">
            <td><?php echo e($country->name); ?></td>
            <td><?php echo e($country->country_code); ?></td>
            <td>
                <form class="row" method="POST" action="<?php echo e(route('country.destroy', $country->id)); ?>" onsubmit="return confirm('Are you sure?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <a href="<?php echo e(route('country.edit', $country->id)); ?>" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo $__env->make('system-mgmt.country.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to <?php echo e(count($countries)); ?> of <?php echo e(count($countries)); ?> entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <?php echo e($countries->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bot'); ?>
    <!-- DataTables -->
    <script src="<?php echo e(asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\SimcoGroup-Inventory\inventorySimcogroup\resources\views/system-mgmt/country/index.blade.php ENDPATH**/ ?>