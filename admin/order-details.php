<?php include "inc/header.php";  ?>

        <!-- Content Wrapper. Contains page content start -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">All Order List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage All Order List</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



     <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                 <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                         <!-- Card-body-->
                         <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Mange All Order List</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>

                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                              <?php
                                 $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
                                 if($do == 'Manage')
                                 {?>
                                    <table id="dataSearch"class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#Sl.</th>
                                                <th>Course Title</th>
                                                <th>User Name</th>
                                                <th>Registration Date</th>
                                                <th>Starting Date</th>
                                                <th>Finishing Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM booking_list  ORDER BY id DESC";
                                                $allCourseList = mysqli_query($db, $sql);
                    
                                                $numberOfCount = mysqli_num_rows($allCourseList);
                                                $i = 0;
                                                while($row = mysqli_fetch_assoc($allCourseList))
                                                {
                                                        $id                =$row['id'];
                                                        $course_id         =$row['course_id'];
                                                        $user_id           =$row['user_id'];
                                                        $start_date        =$row['start_date'];
                                                        $finish_date       =$row['finish_date'];
                                                        $booking_date      =$row['booking_date'];
                                                        $status            =$row['status'];
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $i;  ?></td>
                                                            <td>
                                                                <?php
                                                                $sql = "SELECT * FROM course WHERE id = '$course_id'";
                                                                $theCourse = mysqli_query($db, $sql);

                                                                while($row = mysqli_fetch_assoc($theCourse))
                                                                {
                                                                    $title  =$row['title'];
                                                                    echo $title;
                                                                }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
                                                                $theUser = mysqli_query($db, $sql);

                                                                while($row = mysqli_fetch_assoc($theUser))
                                                                {
                                                                    $fullname  =$row['fullname'];
                                                                    echo $fullname;
                                                                }

                                                                ?>
                                                            </td>
                                                            <td><?php echo $booking_date; ?></td>
                                                            <td>
                                                                <span class="badge bg-warning"><?php echo $start_date;  ?></span>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-warning"><?php echo $finish_date;  ?></span>

                                                            </td>
                                                            <td>
                                                                <?php  
                                                                    if($status == 1)
                                                                    {?>
                                                                        <span class="badge bg-primary">Active Booking</span>
                                                                    <?php }

                                                                    else if($status == 2)
                                                                    {?>
                                                                        <span class="badge bg-info">Book Returned</span>
                                                                    <?php }

                                                                        else if($status == 3)
                                                                        {?>
                                                                        <span class="badge bg-danger">Booking Canceled</span>
                                                                        <?php }

                                                                        else if($status == 4)
                                                                        {?>
                                                                        <span class="badge bg-success">Pending Booking</span>
                                                                        <?php }

                                                                ?>
                                                            </td>
                                                            <td>
                                                                <div class="table-action">
                                                                    <ul>
                                                                        <li><a href="order-details.php?do=Edit&o_id=<?php echo $id;?>"><i class="fa fa-edit"></i></a></li>
                                                                        <li><a href="" data-toggle="modal" data-target="#orderID"><i class="fa fa-trash"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    

                                                <?php }
                                                ?>

                                                
                                        
                                        </tbody>
                                    </table>
                                     
                                <?php }

                                else if($do == 'Edit')
                                {
                                    if(isset($_GET['o_id'])) 
                                    {
                                        $order_id   =$_GET['o_id'];
                                        

                                       $sql = "SELECT * FROM booking_list WHERE id = '$order_id'";
                                       $orderData = mysqli_query($db, $sql);
                                       while($row = mysqli_fetch_assoc($orderData))
                                       {

                                            $id                =$row['id'];
                                            $course_id         =$row['course_id'];
                                            $user_id           =$row['user_id'];
                                            $start_date        =$row['start_date'];
                                            $finish_date       =$row['finish_date'];
                                            $booking_date      =$row['booking_date'];
                                            $status            =$row['status'];
                                           
                                          ?>
                                            <form action="order-details.php?do=Update" method="POST">
                                              <div class="row">
                                                <div class="col-lg-6">
                                                  <div class="form-group">
                                                     <label>Starting Date</label>
                                                     <input type="text" id="datepicker" name="start_date" class="form-control" autocomplete="off" required="required" value="<?php echo $start_date; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Finishing Date</label>
                                                        <input type="text" id="rtndatepicker" name="finish_date" class="form-control" autocomplete="off" required="required"  value="<?php echo $finish_date; ?>">
                                                    </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                      <div class="form-group">
                                                         <label>Booking Status</label>
                                                         <select class="form-control" name="status">
                                                            <option value="4">Please Select Booking Status</option>
                                                            <option value="1" <?php if ($status == 1 ) {echo 'selected' ;} ?>>Active</option>
                                                            <option value="2" <?php if ($status == 2 ) {echo 'selected' ;} ?>>Returned</option>
                                                            <option value="3" <?php if ($status == 3 ) {echo 'selected' ;} ?>>Cancel</option>
                                                            <option value="4" <?php if ($status == 4 ) {echo 'selected' ;} ?>>Pending</option>
                                                    </select>
                                                </div>
                                            </div>

                                              <div>
                                                <input type="hidden" name="order_id" value="<?php echo $id;  ?>">
                                                <input type="hidden" name="course_id" value="<?php echo $course_id;  ?>">
                                                <input type="submit" name="updateOrder" class="btn btn-success" value="save changes">
                                              </div>
                                            </div>
                                        </form>
                                         
                                      <?php }
                                    }
                                }

                                else if($do == 'Update')
                                {
                                    if(isset($_POST['updateOrder']))
                                    {
                                        $order_id      =$_POST['order_id'];
                                        $course_id     =$_POST['course_id'];
                                        $start_date    =date('y-m-d', strtotime($_POST['start_date']));
                                        $finish_date   =date('y-m-d', strtotime($_POST['finish_date']));
                                        $status        =$_POST['status'];
                                        
                                        if($status == 1)
                                        {
                                            $sql = "UPDATE booking_list SET start_date = '$start_date', finish_date = '$finish_date' , status = '$status' WHERE id ='$order_id'";
                                    
                                            $update_order_details = mysqli_query($db, $sql);

                                            // update the of the ordered course

                                            $query = "SELECT * FROM course WHERE id = '$course_id'";
                                            $courseData = mysqli_query($db, $query);
                                            while($row = mysqli_fetch_assoc($courseData))
                                            {
                                                $seat_quantity   =$row['seat_quantity'];
                                                $seat_quantity--;
                                            }

                                            $query2 = "UPDATE course SET seat_quantity = '$seat_quantity' WHERE id = '$course_id'";
                                            $updateCourseData = mysqli_query($db, $query2);

                                            if($updateCourseData)
                                            {
                                                header("Location: order-details.php?do=Manage");
                                            }

                                            else{
                                                die("MySQLi Error. " . mysqli_error($db));
                                            }

                                        }

                                        else if($status == 2)
                                        {
                                            $sql = "UPDATE booking_list SET start_date = '$start_date', finish_date = '$finish_date' , status = '$status' WHERE id ='$order_id'";
                                    
                                            $update_order_details = mysqli_query($db, $sql);

                                            // update the of the ordered course

                                            $query = "SELECT * FROM course WHERE id = '$course_id'";
                                            $courseData = mysqli_query($db, $query);
                                            while($row = mysqli_fetch_assoc($courseData))
                                            {
                                                $seat_quantity   =$row['seat_quantity'];
                                                $seat_quantity++;
                                            }

                                            $query2 = "UPDATE course SET seat_quantity = '$seat_quantity' WHERE id = '$course_id'";
                                            $updateCourseData = mysqli_query($db, $query2);

                                            if($updateCourseData)
                                            {
                                                header("Location: order-details.php?do=Manage");
                                            }

                                            else{
                                                die("MySQLi Error. " . mysqli_error($db));
                                            }
                                        }
    
                                    }
                                }

                               

                                


                                ?>
                              
                            
                            </div>
                        </div>
                        <!-- Card-End-->

                    </div>
                </div>
            </div>
       </section>

</div>

<!-- Content Wrapper. Contains page content End -->


<?php include "inc/footer.php";  ?>