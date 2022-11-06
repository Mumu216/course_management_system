<?php include "inc/header.php";?>
     <section class="booking-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">

                    <h2>Course Admission History</h2>

                    <?php
                          if(!empty($_SESSION['msg']))
                          {
                            ?>
                              <div class="alert alert-info">
                                  <?php echo $_SESSION['msg'] ; ?>
                              </div>
                          <?php }
                    ?>

                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#Sl.</th>
                                <th>Course Title</th>
                                <th>Order Date</th>
                                <th>Start Date</th>
                                <th>Finish Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                         if($_SESSION['user_id'])
                         {
                            $user_id   =$_SESSION['user_id'];

                            $sql = "SELECT * FROM booking_list WHERE user_id = '$user_id' ORDER BY id DESC";
                            $allCourseList = mysqli_query($db, $sql);

                            $numberOfCount = mysqli_num_rows($allCourseList);
                            $i = 0;

                            if($numberOfCount <= 0)
                            {?>
                               <div class="alert alert-info">No Course Admission List Found Yet.</div>
                           <?php }
                            else{
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
                                        <td><?php echo $i; ?></td>
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
                                        <td><?php echo $booking_date; ?></td>
                                        <td><?php echo $start_date;  ?></td>
                                        <td><?php echo $finish_date; ?></td>
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



                                    </tr>
                                <?php }
                            }

                         }
                    ?>
                            
                        </tbody>
                    </table>
           
                </div>


                
             <!-- sidebar content start -->

              <?php include "inc/sidebar.php";?>
            <!-- sidebar content End -->
           <!-- course content end -->
              </div>
            </div>
        </section>
    <!-- All courses section End -->
<?php include "inc/footer.php";?>