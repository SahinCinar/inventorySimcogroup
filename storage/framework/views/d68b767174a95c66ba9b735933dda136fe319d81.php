<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title" >Update Country</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('country.update', $country->id)); ?>">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($country->name); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        
                            <div class="col-md-6">
                                <input id="country_code" type="text" class="form-control" name="country_code" value="<?php echo e($country->country_code); ?>" required>

                                <?php if($errors->has('country_code')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('country_code')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <br><br><br>                        
                        <div class="form-group">
                            <div class="col-md-3 pull-right">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"></i> Update Country
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\InventorySimcoGroup\resources\views/system-mgmt/country/edit.blade.php ENDPATH**/ ?>