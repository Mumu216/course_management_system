<?php include "inc/header.php";?>
     <section class="booking-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">


                    <?php
                        if(isset($_GET['id']))
                        {
                            $theCourseID = $_GET['id'];
                            $sql = "SELECT * FROM course WHERE id = '$theCourseID'";
                            $cData = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($cData))
                            {
                                $id                 =$row['id'];
                                $title              =$row['title'];
                                $seat_quantity      =$row['seat_quantity'];
                            }

                            if($seat_quantity <= 0)
                            {?>
                                <span class="alert alert-info text-center">Sorry!!! This Course is not available now for Registration Purpose. Please Check Back Later. Thank you.</span>
                           <?php }
                           else{?>
                                <h2>Please Fillip information for the Course Confirmation -</h2>
                                
                           <?php 
                               $user_id =  $_SESSION['user_id'] ;
                               $query   ="SELECT * FROM users WHERE user_id = '$user_id'" ;
                               $userData = mysqli_query($db, $query);
                               while( $row = mysqli_fetch_array($userData) )
                               {
                                   $fullname     =$row['fullname'];
                                   $email        =$row['email'];
                                   $phone        =$row['phone'];
                                   $address      =$row['address'];
                               }?>
                     <form action="" method="POST" class="course-form">
                        <div class="row">
                           <div>
                            <table  class="table table-hover table-bordered ">
                              <thead>
                                 <tr>
                                     <th>Fullname</th>
                                     <th>Email Address</th>
                                     <th>Address</th>
                                     <th>Phone No.</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td><?php echo $fullname;  ?></td>
                                      <td><?php echo $email;  ?></td>
                                      <td><?php echo $address;  ?></td>
                                      <td><?php echo $phone;  ?></td>
                                    </tr>

                              </tbody>
                          </table>

                            </div>

                            <div class="col-lg-6 offset-lg-3">
                              <div class="mb-3">
                                 <label>Starting Date</label>
                                 <input type="text" id="datepicker" name="start_date"  class="form-control" placeholder="Please Input the Starting date of the Course" autocomplete="off" required="required">
                                </div>

                             <div class="mb-3">
                                 <label>Finishing Date</label>
                                 <input type="text" id="rtndatepicker" name="finish_date"  class="form-control" placeholder="Please Input the Finishing Date of the Course" autocomplete="off" required="required">
                          </div>

                           <div class="mb-3">
                             <input type="hidden" name="course_id" value="<?php echo $theCourseID; ?>">
                             <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                             <button type="submit" name="placeRegister" class="btn-course">Proceed the Register</button> 

                           </div>

                            </div>

                        </div>

                     </form>
                               
                          <?php }
                               if(isset($_POST['placeRegister']))
                               {
                                   $course_id      =$_POST['course_id'];
                                   $user_id        =$_POST['user_id'];
                                   $start_date     =date('y-m-d' ,strtotime($_POST['start_date']));
                                   $finish_date    =date('y-m-d' ,strtotime($_POST['finish_date']));

                                   if(!empty($start_date) && !empty($finish_date))
                                   {
                                    $sql = "INSERT INTO booking_list (course_id, user_id, start_date, finish_date, booking_date) VALUES('$course_id' , '$user_id' , '$start_date' , '$finish_date' , now())";
                                     

                                    $booking_confirmation = mysqli_query($db, $sql);

                                    if($booking_confirmation)
                                    {
                                        $_SESSION['msg'] = "Your Registration is pending for admin approval. Please Contact with the Admission Office Physically to receive the course.";
                                       header("Location: order-history.php");
                                    }
                                    else{
                                        die("MySQLi Error. " . mysqli_error($db) ) ;
                                    }
                                    }
                                   }
                               }
                               
                        

                     ?>

                   

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