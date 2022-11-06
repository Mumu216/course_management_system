 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <?php
                $user_id =  $_SESSION['user_id'] ;
                $query ="SELECT * FROM users WHERE user_id = '$user_id'" ;
                $userData = mysqli_query($db, $query);
                while( $row = mysqli_fetch_assoc($userData) )
                { 
                    $image   =$row['image'] ;
                    if (!empty($image))
                    {?>
                        <img src="dist/img/users/<?php echo  $image  ?>" class="img-circle elevation-2" alt="User Image">
                      
                  <?php   }
                  else
                  { ?>
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
              <?php   }

                  ?>
                
            <?php 
              }
            ?>
        </div>
        <div class="info">
        <a href="#" class="d-block">
        <?php
            $user_id =  $_SESSION['user_id'] ;
            $query = "SELECT * FROM users WHERE user_id = '$user_id'" ;
            $userData = mysqli_query($db, $query);
            while( $row = mysqli_fetch_assoc($userData) )
            {
                echo $row['fullname'];
            }
           ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-header">library Management</li>
            <!-- category management start -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                All Category
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Category</p>
                </a>
            </li>
            <!-- category management start -->

                <!-- course management start -->
             
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage All Course's
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="courses.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="courses.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Course</p>
                </a>
            </li>

             <!-- order management -->
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage All Order
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Order-details.php?do=Manage" class="nav-link">
                  <i class="far fa-circle "></i>
                  <p>Manage All Order</p>
                </a>
              </li>

             <!-- order management -->

           
          <li class="nav-header">Users Management</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                All User
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New User</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>