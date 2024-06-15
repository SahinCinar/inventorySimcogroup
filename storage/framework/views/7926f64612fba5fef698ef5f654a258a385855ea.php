<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="box">
        <?php echo $__env->make('flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="box-header">
    <div class="row">
      <div class="col-sm-8">
        <h3 class="box-title" >List of States</h3>
      </div>
        <div class="col-sm-4 text-right">
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addState">
            <i class="fa fa-plus"></i> Add New State
          </button>
          <a href="#" onclick="window.print();" class="btn btn-primary ">
                                <i class="fa fa-print"></i> Print Page
        </a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="<?php echo e(route('state.search')); ?>">
         <?php echo e(csrf_field()); ?>

         <?php $__env->startComponent('layouts.search', ['title' => 'Search']); ?>
          <?php $__env->startComponent('layouts.two-cols-search-row', ['items' => ['Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']]); ?>
          <?php echo $__env->renderComponent(); ?>
        <?php echo $__env->renderComponent(); ?>
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered table-dark">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="state: activate to sort column ascending">State Name</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="country: activate to sort column ascending">Country Name</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr role="row" class="odd">
                  <td><?php echo e($state->name); ?></td>
                  <td><?php echo e($state->country_name); ?></td>
                  <td>
                    <form class="row" method="POST" action="<?php echo e(route('state.destroy', $state->id)); ?>" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <a href="<?php echo e(route('state.edit', $state->id)); ?>" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                          <i class="fa fa-edit fa-lg"></i>
                        </a>
                        
                        <button type="submit" title="Delete State" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          <i class="fa fa-trash fa-lg"></i>
                        </button>
                    </form>
                  </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <?php echo $__env->make('system-mgmt.state.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to <?php echo e(count($states)); ?> of <?php echo e(count($states)); ?> entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <?php echo e($states->links()); ?>

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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/system-mgmt/state/index.blade.php ENDPATH**/ ?>