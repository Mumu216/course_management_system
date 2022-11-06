<?php include "inc/header.php";?>

   <!-- All course details section start -->
   <section class="all-courses">
    <div class="container">
        <div class="row">
           <div class="col-lg-4">
             <?php
               if(isset($_GET['c']))
               {
                  $cid = $_GET['c'];
                  $sql = "SELECT * FROM course WHERE id = '$cid'";
                  $details = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_assoc($details))
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
                      <div class="course-thumbnail">
                            <?php

                            if(!empty($image)){?>
                                <img src="admin/dist/img/courses/<?php echo $image; ?>" class="img-fluid">
                            <?php  }
                            else{?>
                                <img src="admin/dist/img/default.jpg" class="img-fluid" >
                            <?php }
                            ?>
                      
                        </div>
                      
                 <?php }
                  
               }
             ?>
           </div>
           <div class="col-lg-5 course-details">
             <h4><?php echo $title;  ?></h4>
             <p class="sub-title"><?php  echo $sub_title;?></p>
             <p class="quantity"> Quantity: <span><?php echo $seat_quantity;?>Pcs</span></p>
             <h6 class="mentor-name">Written By --- <?php echo $mentor_name; ?></h6>
             <p><?php echo $description;  ?></p>
             <?php
                
                if(empty($_SESSION['email']))
                {?>
                   <a href="" class="course-btn">Login to Register Your Course</a>
                    
               <?php }
               else{?>
                      <a href="" class="course-btn">Register Now</a>
                     
            <?php }
                ?>
                </div>

           <!-- sidebar content start -->

           <?php include "inc/sidebar.php";?>
           <!-- sidebar content End -->
        </div>
    </div>
</section>
   <!-- All course details section end -->


<?php include "inc/footer.php";?>

