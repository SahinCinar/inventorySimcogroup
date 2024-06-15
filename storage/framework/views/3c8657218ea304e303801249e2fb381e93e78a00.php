<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if(\Auth::check() && \Auth::user()->is_staff)
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('user-profile.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo e(\Auth::user()->name); ?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
@endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form> 
        

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">Functions</li> -->
            <!-- Optionally, you can add icons to the links -->
            <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?php echo e(route('categories.index')); ?>"><i class="fa fa-list"></i> <span>Category</span></a></li>
            <li><a href="<?php echo e(route('products.index')); ?>"><i class="fa fa-cubes"></i> <span>Product</span></a></li>
            <li><a href="<?php echo e(route('customers.index')); ?>"><i class="fa fa-users"></i> <span>Customer</span></a></li>
            <li><a href="<?php echo e(route('sales.index')); ?>"><i class="fa fa-cart-plus"></i> <span>Sales</span></a></li>
            <li><a href="<?php echo e(route('suppliers.index')); ?>"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
            <li><a href="<?php echo e(route('productsOut.index')); ?>"><i class="fa fa-minus"></i> <span>Outgoing Products</span></a></li>
            <li><a href="<?php echo e(route('productsIn.index')); ?>"><i class="fa fa-cart-plus"></i> <span>Purchase Products</span></a></li>
            <li><a href="<?php echo e(route('employee-management.index')); ?>"><i class="fa fa-users"></i> <span>Employee's</span></a></li>
            <li><a href="<?php echo e(route('department.index')); ?>"><i class="fa fa-solid fa-building"></i> <span>Departments</span></a></li>
            <li class="treeview">
            <a href="#"><i class="fa fa-gear fa-lg"></i> <span> General Management </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('system-management/department')); ?>">Department</a></li>
            <li><a href="<?php echo e(url('system-management/division')); ?>">Division</a></li>
            <li><a href="<?php echo e(url('system-management/country')); ?>">Country</a></li>
            <li><a href="<?php echo e(url('system-management/state')); ?>">State</a></li>
            <li><a href="<?php echo e(url('system-management/city')); ?>">City</a></li>
          </ul>
        </li>
        <li><a href="<?php echo e(url('system-management/report')); ?>"><i class="fa fa-book fa-lg"></i> <span> Generate Reports </span></a></li>
            <li><a href="<?php echo e(route('user.index')); ?>"><i class="fa fa-user-secret"></i> <span>System Users</span></a></li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\Users\Sahin\Desktop\InventoryMS\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>