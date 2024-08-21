<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title">List of Current Employees</h3>
        </div>
        <div class="col-sm-1" style="margin-left:40%;">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('report.excel')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="<?php echo e($searchingVals['from']); ?>" name="from" />
                <input type="hidden" value="<?php echo e($searchingVals['to']); ?>" name="to" />
                <button type="submit" class="btn btn-primary pull-right">
                 <i class="fa fa-excel-o"></i> Export to Excel
                </button>
            </form>
        </div>
        <div class="col-sm-2">
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('report.pdf')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" value="<?php echo e($searchingVals['from']); ?>" name="from" />
                <input type="hidden" value="<?php echo e($searchingVals['to']); ?>" name="to" />
                <button type="submit" class="btn btn-danger pull-right">
                  Export to PDF
                </button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="<?php echo e(route('report.search')); ?>">
         <?php echo e(csrf_field()); ?>

      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered table-dark">
            <thead>
              <tr role="row">
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee Name</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Date of Birth</th>
                <th width = "40%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Join Date</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr role="row" class="odd">
                  <td><?php echo e($employee->firstname); ?> <?php echo e($employee->middlename); ?> <?php echo e($employee->lastname); ?></td>
                  <td><?php echo e($employee->birthdate); ?></td>
                  <td><?php echo e($employee->address); ?></td>
                  <td><?php echo e($employee->date_join); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to <?php echo e(count($employees)); ?> of <?php echo e(count($employees)); ?> entries</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Downloads\2PGM-Cinar-Sahin-SimcoGroupInventaris\2PGM-Cinar-Sahin-SimcoGroupInventaris\inventorySimcogroup\resources\views/system-mgmt/report/index.blade.php ENDPATH**/ ?>