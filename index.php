<?php include "inc/header.php";?>

    <!-- All course section start -->
        <section class="all-courses">
            <div class="container">
                <div class="row">
                    <!-- course content start -->
                    <div class="col-lg-9">
                        <div class="row">

                           <?php
                             $sql = "SELECT * FROM course WHERE status = 1 ORDER BY title ASC";
                             $allCourse = mysqli_query($db, $sql);
                             $totalCourses = mysqli_num_rows($allCourse);

                             if($totalCourses <= 0){?>
                                   <div class="alert alert-info">OPPS!!! No course Found Yet.</div>
                            <?php }

                                 else{
                                    while($row = mysqli_fetch_assoc($allCourse))
                                    {
                                        $id                 =$row['id'];
                                        $title              =$row['title'];
                                        $sub_title          =$row['sub_title'];
                                        $description        =$row['description'];
                                        $cat_id             =$row['cat_id'];
                                        $mentor_name        =$row['mentor_name'];
                                        $seat_quantity      =$row['seat_quantity'];
                                        $image              =$row['image'];
                                        $status             =$row['status'];
                                        ?>
                                           <div class="col-lg-4 course-item">
                                             <div class="course-thumbnail">
                                                <?php

                                                   if(!empty($image)){?>
                                                      <img src="admin/dist/img/courses/<?php echo $image; ?>" class="img-fluid">
                                                 <?php  }
                                                 else{?>
                                                      <img src="admin/dist/img/ default.jpg" class="img-fluid" >
                                                <?php }
                                                ?>
                                               <div class="mentor-info">
                                                 <h4> <?php echo $mentor_name; ?></h4>
                                               </div>
                                            </div>
                                               <div class="course-info">
                                                 <h4><?php echo $title;  ?></h4>
                                                 <p class="sub-title"><?php  echo $sub_title;?></p>
                                                 <p class="quantity"> Quantity: <span><?php echo $seat_quantity;?>Pcs</span></p>
                                                 <p><?php echo substr($description, 0,50);  ?>.... <a href="details.php?c=<?php echo $id;?>">Read More</a></p>
                                                 <?php
                                                  if(empty($_SESSION['email']))
                                                    {?>
                                                        <a href="login.php" class="course-btn">Login to Register Your Course</a>
                                                        
                                                    <?php }
                                                    else{?>
                                                            <a href="booking.php?id=<?php echo $id; ?>" class="course-btn">Register Now</a>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                   <?php }
                                       
                                 }

                            ?>
                         

                        </div>

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

