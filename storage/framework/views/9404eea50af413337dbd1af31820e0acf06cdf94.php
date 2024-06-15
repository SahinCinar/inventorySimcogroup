<?php $__env->startSection('top'); ?>
<style type="text/css">
    .row-centered {
        text-align: center;
    }
    .col-centered {
        display: inline-block;
        float: none;
        text-align: left;
        margin-right: -4px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Add Users</h3>
    </div>
    <div class="box-body">
        <div class="row row-centered">
            <div class="col-md-8 col-centered">
                <form class="form-auth-small" method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="signup-name" class="control-label sr-only">Name</label>
                        <input type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="signup-name" name="name" value="<?php echo e(old('name')); ?>" required autofocus placeholder="Name">
                        <?php if($errors->has('name')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="signup-email" class="control-label sr-only">Email</label>
                        <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Email">
                        <?php if($errors->has('email')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="signup-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Password">
                        <?php if($errors->has('password')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="signup-password-confirmation" class="control-label sr-only">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-role" class="control-label sr-only">Role</label>
                        <select class="form-control<?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>" name="role" required>
                            <option value="" disabled selected>Select Role</option>
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                        <?php if($errors->has('role')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($errors->first('role')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-md btn-block">REGISTER</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <a href="/user" class="btn btn-danger">Back</a>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sahin\Desktop\InventorySimcoGroup\resources\views/auth/register.blade.php ENDPATH**/ ?>