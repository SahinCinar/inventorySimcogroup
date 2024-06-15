















<style>
    #product-masuk {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #product-masuk td, #product-masuk th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #product-masuk tr:nth-child(even){background-color: #f2f2f2;}

    #product-masuk tr:hover {background-color: #ddd;}

    #product-masuk th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="product-masuk" width="100%">
    <thead>
    <tr>
        <td>ID</td>
        <td>Product</td>
        <td>Customer</td>
        <td>Quantity</td>
        <td>Date</td>
    </tr>
    </thead>
    <?php $__currentLoopData = $product_keluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tbody>
        <tr>
            <td><?php echo e($p->id); ?></td>
            <td><?php echo e($p->product->nama); ?></td>
            <td><?php echo e($p->customer->nama); ?></td>
            <td><?php echo e($p->qty); ?></td>
            <td><?php echo e($p->tanggal); ?></td>
        </tr>
        </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>












<?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/product_keluar/productKeluarAllExcel.blade.php ENDPATH**/ ?>