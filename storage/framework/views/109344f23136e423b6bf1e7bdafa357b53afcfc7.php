
  <!-- Modal -->
  <div class="modal fade" id="addCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" >Add new Country</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle"> New Country Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('country.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <input id="country_code" type="text" class="form-control" name="country_code" value="<?php echo e(old('country_code')); ?>" required>
                            <?php if($errors->has('country_code')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('country_code')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-primary">Save Country</button>
        </div>
    </form>
      </div>
    </div>
  </div><?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/system-mgmt/country/create.blade.php ENDPATH**/ ?>