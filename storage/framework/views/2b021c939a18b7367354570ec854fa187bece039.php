 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      td, th {
        border: solid 2px;
        padding: 10px 5px;
      }
      tr {
        text-align: center;
      }
      .container {
        width: 100%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div><h2>List of Employees From ( <?php echo e($searchingVals['from']); ?> ) <b style="color:red"> To </b> ( <?php echo e($searchingVals['to']); ?> )</h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="20%">Name</th>
                <th width="10%">Country</th>
                <th width="15%">Date of Birth</th>
                <th width="20%">Address</th>
                <th width="10%">Department</th>
                <th width="10%">Division</th> 
                <th width="15%">Join Date</th>
                            
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr role="row" class="odd">
                  <td><?php echo e($employee['firstname']); ?> <?php echo e($employee['middlename']); ?> <?php echo e($employee['lastname']); ?></td>
                  <td><?php echo e($employee['country']); ?></td>
                  <td><?php echo e($employee['birthdate']); ?></td>
                  <td><?php echo e($employee['address']); ?></td>
                  <td><?php echo e($employee['department_name']); ?></td>
                  <td><?php echo e($employee['division_name']); ?></td>
                  <td><?php echo e($employee['date_join']); ?></td>
                  
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>
  </body>
</html><?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/system-mgmt/report/pdf.blade.php ENDPATH**/ ?>