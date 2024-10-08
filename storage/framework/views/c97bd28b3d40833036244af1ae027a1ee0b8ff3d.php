















<style>
    #categories {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #categories td, #categories th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #categories tr:nth-child(even){background-color: #f2f2f2;}

    #categories tr:hover {background-color: #ddd;}

    #categories th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="categories" width="100%">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Address</td>
        <td>Email</td>
    </tr>
    </thead>
    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
        <tr>
            <td><?php echo e($s->id); ?></td>
            <td><?php echo e($s->nama); ?></td>
            <td><?php echo e($s->alamat); ?></td>
            <td><?php echo e($s->email); ?></td>
        </tr>
        </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>












<?php /**PATH C:\Users\Sahin\Downloads\2PGM-Cinar-Sahin-SimcoGroupInventaris\2PGM-Cinar-Sahin-SimcoGroupInventaris\inventorySimcogroup\resources\views/suppliers/SuppliersAllPDF.blade.php ENDPATH**/ ?>