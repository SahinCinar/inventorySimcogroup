<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <?php echo $__env->make('flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of departments</h3>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDepartment">
                                <i class="fa fa-plus"></i> Add New Department
                            </button>
                            <a href="#" onclick="window.print();" class="btn btn-primary">
                                <i class="fa fa-print"></i> Print Page
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="<?php echo e(route('department.search')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
                                <?php $__env->startComponent('layouts.two-cols-search-row', ['items' => ['Name'], 'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']]); ?>
                                <?php echo $__env->renderComponent(); ?>
                            <?php echo $__env->renderComponent(); ?>
                        </form>
                        <br>
                        <div class="col-sm-12">
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr role="row">
                                        <th >Department Name</th>
                                        <th >Department Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td><?php echo e($department->name); ?></td>
                                            <td><?php echo e($department->code); ?></td>
                                            <td>
                                                <form class="row" method="POST" action="<?php echo e(route('department.destroy', $department->id)); ?>" onsubmit="return confirm('Are you sure?')">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <a href="<?php echo e(route('department.edit', $department->id)); ?>" title="Edit Department" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                                                        <i class="fa fa-edit fa-lg"></i>
                                                    </a>
                                                    <button type="submit" title="Delete Department" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo $__env->make('system-mgmt.department.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Add Department Form Modal -->
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing <?php echo e($departments->firstItem()); ?> to <?php echo e($departments->lastItem()); ?> of <?php echo e($departments->total()); ?> entries</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <?php echo e($departments->links()); ?>

                                </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\SimcoGroup-Inventory\inventorySimcogroup\resources\views/system-mgmt/department/index.blade.php ENDPATH**/ ?>