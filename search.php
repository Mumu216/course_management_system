<?php include "inc/header.php";?>

   <!-- All course details section start -->
   <section class="all-courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <h2>Search Result -</h2>
                <?php
                   if($_POST['searchBtn'])
                   {
                     $sContent = $_POST['search'];
                     $sql = "SELECT * FROM course WHERE title LIKE '%$sContent' OR description LIKE '%$sContent%' OR mentor_name LIKE '%$sContent%' ORDER BY title ASC ";
                     $readData = mysqli_query($db, $sql);
                     $foundTotal = mysqli_num_rows($readData);

                     if($foundTotal == 0)
                     {?>
                          <div class="alert alert-info">
                                 Sorry!!! No course found in your database regarding in your search topic - <b> <?php echo $sContent; ?></b>
                            </div>
                    <?php }
                    else{
                        while($row = mysqli_fetch_assoc($readData))
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
                                        <a href="" class="course-btn">Register Now</a>
                                    </div>
                                </div>
                       <?php }
                    }
                   }
                ?>
                </div>
              
             
            </div>
            <!-- sidebar content start -->
            
            <?php include "inc/sidebar.php";?>
           <!-- sidebar content End -->

            

        </div>
    </div>
</section>

<?php include "inc/footer.php";?>
