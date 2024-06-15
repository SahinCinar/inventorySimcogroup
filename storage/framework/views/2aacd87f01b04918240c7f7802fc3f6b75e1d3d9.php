<?php $__env->startSection('top'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="box box-success">
        <div class="box">
            <div class="box-header">

                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of Employees</h3>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addEmployee">
                            <i class="fa fa-plus"></i> Add New Employee
                        </button>
                    </div>
                    <?php echo $__env->make('employees-mgmt.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <form method="POST" action="<?php echo e(route('employee-management.search')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
                        <?php $__env->startComponent('layouts.two-cols-search-row', ['items' => ['First Name', 'Department_Name'], 'oldVals' => [isset($searchingVals) ? $searchingVals['firstname'] : '', isset($searchingVals) ? $searchingVals['department_name'] : '']]); ?>
                        <?php echo $__env->renderComponent(); ?>
                    <?php echo $__env->renderComponent(); ?>
                </form>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">DoB</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Division</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td><img src="../<?php echo e($employee->picture); ?>"  class="user-image" width="50px" height="50px"/></td>
                                            <td><?php echo e($employee->firstname); ?> <?php echo e($employee->middlename); ?> <?php echo e($employee->lastname); ?></td>
                                            <td class="hidden-xs"><?php echo e($employee->birthdate); ?></td>
                                            <td class="hidden-xs"><?php echo e($employee->department_name); ?></td>
                                            <td class="hidden-xs"><?php echo e($employee->division_name); ?></td>
                                            <td colspan="3">
                                                <form class="row" method="POST" action="<?php echo e(route('employee-management.destroy', $employee->id)); ?>" onsubmit = "return confirm('Are you sure?')">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <a href="<?php echo e(route('employee-management.edit', $employee->id)); ?>" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                    <a href="<?php echo e(route('employee-management.edit', $employee->id)); ?>" class="btn btn-primary col-sm-2 col-xs-3 btn-margin">
                                                        <i class="fa fa-print "></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin">
                                                        <i class="fa fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to <?php echo e(count($employees)); ?> of <?php echo e(count($employees)); ?> entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <?php echo e($employees->links()); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/employees-mgmt/index.blade.php ENDPATH**/ ?>