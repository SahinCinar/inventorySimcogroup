<?php $__env->startSection('content'); ?>
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">List of Divisions</h3>
        <div class="text-right">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addDivision">
                <i class="fa fa-plus"></i> Add New Division
            </button>
        <a href="#" onclick="window.print();" class="btn btn-primary ">
                                <i class="fa fa-print"></i> Print Page
        </a></div>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
        </div>
        <form method="POST" action="<?php echo e(route('division.search')); ?>">
            <?php echo e(csrf_field()); ?>

            <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
                <?php $__env->startComponent('layouts.two-cols-search-row', ['items' => ['Name'], 'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '', isset($searchingVals) ? $searchingVals['name'] : '']]); ?>
                <?php echo $__env->renderComponent(); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr role="row" class="odd">
                                    <td><?php echo e($division->id); ?></td>
                                    <td><?php echo e($division->name); ?></td>
                                    <td><?php echo e($division->code); ?></td>
                                    <td colspan="3">
                                        <form class="row" method="POST" action="<?php echo e(route('division.destroy', $division->id)); ?>" onsubmit="return confirm('Are you sure?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <a href="<?php echo e(route('division.edit', $division->id)); ?>" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                                                <i class="fa fa-edit "></i>
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
                    <?php echo $__env->make('system-mgmt.division.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to <?php echo e(count($divisions)); ?> of <?php echo e(count($divisions)); ?> entries</div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <?php echo e($divisions->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/system-mgmt/division/index.blade.php ENDPATH**/ ?>