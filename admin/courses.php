<?php include "inc/header.php" ; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Course Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Course Management</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">

             <?php
                 
                 $do = isset($_GET['do']) ? $_GET['do'] : "Manage" ;

                 // All Users Manage Page
                 if($do == "Manage")
                 {
                  ?>
                  <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Manage All Course Page</h3>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <table id="dataSearch" class="table table-dark table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Title</th>
                                <th scope="col">Sub Title</th>
                                <th scope="col">Mentor Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                              </tr>
                            </thead>
                            <tbody>

                                  <?php  
                                   
                                   $sql = "SELECT * FROM course WHERE status = 1 ORDER BY title ASC";

                                   $allData= mysqli_query($db,$sql);
                                   $numOfCourses = mysqli_num_rows($allData);
                                  //  echo $numOfCourses;
                                  if($numOfCourses == 0)
                                  {
                                    ?>
                                         <div class="alert alert-info">
                                             Right Now, No course is available in our admin panel. When we add some courses then you can see the Admin Panel.  
                                         </div>

                                 <?php }
                                 else{
                                     
                                  $i=0;

                                  while ($row = mysqli_fetch_assoc($allData)) 
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
                                   $i++;

                                  ?>  

                              <tr>
                               <th scope="row"><?php echo $i;  ?></th>
                               <td>
                                   <?php
                                    if(!empty($image)) { ?>
                                       
                                     <img src="dist/img/courses/<?php echo $image; ?>" width="35">
                                   <?php } 

                                   else{?>
                                      
                                     <img src="dist/img/courses/ default.jpg" width="35">
                                  <?php  }
                                  ?>
                               </td>
                               <td><?php echo $title;  ?></td>
                               <td> <?php echo $sub_title;?></td>
                               <td><?php echo $mentor_name;?></td>
                               <td>
                                <?php
                                   
                                   $sql = "SELECT * FROM category WHERE cat_id = '$cat_id'";
                                   $catName = mysqli_query($db, $sql);
                                   while($row = mysqli_fetch_assoc($catName))
                                   {
                                    $cat_id 		  = $row['cat_id'];
                                    $cat_name 		= $row['cat_name'];
                                 
                                    ?>
                                
                                     <span class="badge badge-success"><?php  echo $cat_name; ?></span>
                                <?php   }
                                 ?>
                                
                              
                              </td>
                               <td><?php echo $seat_quantity;?></td>
                               <td>
                               <?php
                                  if( $status==2) 
                                  { ?>
                                   <span class="badge badge-danger">Inactive</span>
                                   
                                <?php   }
                                else if($status==1)
                               { ?>
                                 
                                 <span class="badge badge-success">Active</span>
                                 <?php   }
                                 ?>
                                 </td>
                               <td>

                               <div class="table-action">
                                   <ul>
                                   
                                   <li> <a href="courses.php?do=Edit&uid=<?php echo $id; ?>"><i class="fa fa-edit"></i></a>
                                   </li>
                                   <li> <a href="courses.php?do=Delete&uid=<?php echo $id; ?>" data-toggle="modal" data-target="#delUserId<?php echo $id;?>"><i class="fa fa-trash"></i></a>
                                   </li>
                                   </ul>

                                   <!-- Modal-->


                                   <div class="modal fade" id="delUserId<?php echo $id;  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this User</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                         </button>
                                       </div>
                                       <div class="modal-body">
                                          <div class="modal-buttons">
                                            <ul>
                                              <li>
                                                <a href="courses.php?do=Delete&uid=<?php echo $id; ?>" class="btn btn-success">Confirm</a>
                                              </li>
                                              <li>
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                             </li>
                                            </ul>
                                           </div>
                                       </div>
                                     </div>
                                   </div>  
                                 </div>
                                  </div>
                               </td>
                            </tr>

                                    
               <?php   }
                        }

                  ?>
              </tbody>
              </table>
                </div>
              </div>
            
                 <?php
              }

                 else if( $do == "Add")

                 {
                   ?>
                       
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Register A New Course</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                              <div class="col-lg-6">
                               <form action="courses.php?do=Store" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" name="title" class="form-control" placeholder="Title of the Course......" required="required" autocomplete="off">
                                </div>
                                
                
                             <div class="form-group">
                                 <label>Sub Title</label>
                                 <input type="text" name="sub_title" class="form-control" placeholder="Sub Title..." required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Mentor</label>
                                 <input type="text" name="mentor_name" class="form-control" placeholder="Name of the Mentor..." required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Seat Quantity</label>
                                 <input type="text" name="seat_quantity" class="form-control" placeholder="Seat Quantity..." required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Category Name</label>
                                  <select class="form-control" name="cat_id" >
                                    <option value="">Please Select The Category or Sub Category Name</option>
                                      
                                    <?php
                                        $sql = "SELECT * FROM category WHERE is_parent = 0 ORDER BY cat_name ASC";
                                        $parentCat = mysqli_query($db, $sql);
                                        while($row = mysqli_fetch_assoc($parentCat))
                                        {
                                          $p_cat_id 		  = $row['cat_id'];
                                          $p_cat_name 		= $row['cat_name'];
                                          ?>
                                           
                                           <option value="<?php echo $p_cat_id;  ?>"><?php echo  $p_cat_name;   ?></option>
                                       <?php

                                          $query = "SELECT * FROM category WHERE is_parent= '$p_cat_id' ORDER BY cat_name ASC";
                                           $childCat = mysqli_query($db, $query);
                                          while($row = mysqli_fetch_assoc($childCat))
                                          {
                                            $c_cat_id      =$row['cat_id'];
                                            $c_cat_name    =$row['cat_name'];
                                            ?>
                                              
                                          <option value="<?php echo $c_cat_id; ?>"> --<?php echo $c_cat_name; ?></option>


                                          <?php   }

                                      }
                                       
                                    ?>
                                  </select>
                             </div>

                             <div class="form-group">
                                   <label>Course Status</label>
                                     <select class="form-control" name="status">
                                       <option value="1">Please Select Course Status</option>
                                       <option value="1">Active</option>
                                       <option value="2">InActive</option>
                                   </select>
                                  </div>
                            </div>

                              <div class="col-lg-6">
                                <div class="form-group">
                                 <label>Description</label>
                                 <textarea id="description" class="form-control" name="description"  rows="5"></textarea>
                             </div>


                             

                              <div class="form-group">
                                <label>Thumbnail picture</label>
                                 <input type="file" name="image" class="form-control-file">
                               </div>

                               <div class="form-group">
                                 <input type="submit" name="addCourse" class="btn btn-success btn-mb-0">
                                </div>

                              </div>

                            </div>

                          </form>

                        </div>
                      </div>
                <?php 
                  }

                  elseif($do == "Store")
                  {
                    if (isset($_POST['addCourse']))
                    { 
                          $title                 = mysqli_real_escape_string($db, $_POST['title']);
                          $sub_title             = mysqli_real_escape_string($db, $_POST['sub_title']);
                          $mentor_name           =$_POST['mentor_name'];
                          $seat_quantity         =$_POST['seat_quantity'];
                          $cat_id                =$_POST['cat_id'];
                          $description           = mysqli_real_escape_string($db, $_POST['description']);
                          $status                =$_POST['status'];

                        
                          $image                 =$_FILES['image']['name'];
                          $image_temp            =$_FILES['image']['tmp_name'];
                             
                      

                          if(!empty($image))
                          {
                             
                             $image_name     =rand(1,999999) .  '_' . $image;

                              move_uploaded_file ($image_temp, "dist/img/courses/$image_name");
                          
                             $sql ="INSERT INTO course(title,sub_title,	description, cat_id	,mentor_name, seat_quantity,	image,	status) VALUES ('$title','$sub_title','$description','$cat_id','$mentor_name','$seat_quantity', '$image_name', '$status')";
                             
                              
                             $registerBook = mysqli_query($db,$sql) ;

                              if($registerBook) {
                                header("Location: books.php?do=Manage");
                              } 
                              else{
                                
                              die("MySQli Error. "  . mysqli_error($db));

                              }

                             }

                           else 
                           {
                           $sql ="INSERT INTO book(title,sub_title,	description	,cat_id	,mentor_name,	seat_quantity,	status) VALUES ('$title','$sub_title','$description','$cat_id','$mentor_name','$seat_quantity', '$status')";
                              
                           $registerBook = mysqli_query($db,$sql) ;

                           if($registerBook) {
                             header("Location: books.php?do=Manage");
                           }else{
                              die("MySQli Error. "  . mysqli_error($db));
                           }
                   
                          }

                  }
                      
                   }

                  elseif( $do == "Edit")
                  {
                     if(isset($_GET['uid']))
                      { 
                        $updateID = $_GET['uid'];
                        $sql = "SELECT * FROM users WHERE user_id = '$updateID'";
                        $userData = mysqli_query($db, $sql);
                        while($row = mysqli_fetch_assoc($userData))
                        {
                            $user_id       =$row['user_id'];
                            $fullname      =$row['fullname'];
                            $email        =$row['email'];
                            $password     =$row['password'];
                            $phone        =$row['phone'];
                            $address      =$row['address'];
                            $image        =$row['image'];
                            $role         =$row['role'];
                            $status       =$row['status'];
                            $join_date     =$row['join_date'];

                            ?>

                              <!-- HTML Form Start -->
                              <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Update User Information</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                              <div class="col-lg-6">
                               <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                 <label>Full Name</label>
                                 <input type="text" name="fullname" class="form-control" placeholder="Your Full Name......" value="<?php echo $fullname; ?>" required="required" autocomplete="off">
                                </div>
                                
                
                             <div class="form-group">
                                 <label>Email Address</label>
                                 <input type="email" name="email" class="form-control" placeholder=" Email Address..." value="<?php echo $email;   ?>" required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" name="password" class="form-control" placeholder="xxxxxx..." autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Re-Type Password</label>
                                 <input type="password" name="repassword" class="form-control" placeholder="xxxxxxxx..." autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Phone</label>
                                 <input type="text" name="phone" class="form-control" placeholder="Phone No..." value="<?php echo $phone; ?>" >
                             </div>
                            </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="address" class="form-control" placeholder=" Your address..." value="<?php echo $address;  ?>">
                                </div>

                                <div class="form-group">
                                   <label>User Role</label>
                                     <select class="form-control" name="role">
                                       <option value="2">Please select User Role</option>
                                       <option value="1" <?php if($role == 1) {echo'selected';} ?> >Admin</option>
                                       <option value="2" <?php if($role == 2) {echo'selected';} ?> >User</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                   <label>User Status</label>
                                     <select class="form-control" name="status">
                                       <option value="0">Please Select User Status</option>
                                       <option value="1"  <?php  if($status == 1)  {echo 'selected';}?> >Active</option>
                                       <option value="0"> <?php  if($status == 0)  {echo 'selected';}?> > InActive</option>
                                   </select>
                                  </div>

                                  <div class="form-group">
                                   <label> Profile picture</label>
                                <br>
                                  
                                <?php
                                  if(!empty($image))
                                  {
                                    ?>
                                    <img src="dist/img/users/<?php echo $image;  ?>" alt="" width="35px">
                                 <?php }
                                 else{?>
                                     No Profile picture Found.
                                <?php }
                                 ?>
                                 <input type="file" name="image" class="form-control-file">
                               </div>
                                <br><br>

                               <div class="form-group">
                                 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                 <input type="submit" name="updateUser" class="btn btn-success btn-mb-0" value="Save Changes">
                                </div>

                              </div>

                            </div>

                          </form>

                        </div>
                      </div>
                              
                                  
                              <!-- HTML Form  End-->
                       <?php  }
                      }
                     
                  }
                

                  elseif($do == "Update")
                  {
                     if(isset($_POST['updateUser']))
                     { 
                          $user_id        =$_POST['user_id'];
                          $fullname       =$_POST['fullname'];
                          $email          =$_POST['email'];
                          $password       =$_POST['password'];
                          $repassword     =$_POST['repassword'];
                          $phone          =$_POST['phone'];
                          $address        =$_POST['address'];
                          $role           =$_POST['role'];
                          $status         =$_POST['status'];

                        
                                
                          $image          =$_FILES['image']['name'];
                          $image_temp     =$_FILES['image']['tmp_name'];

                          // Both for image and password with all data changes
                          if(!empty($password) && !empty($image))
                          {
                                // New password checked & encrypted
                                if($password == $repassword)
                                {
                                  $hassedPass = sha1($password);
                                }
                                // Delete image if already exists
                                $query = "SELECT * FROM users WHERE user_id = '$user_id'";
                                $oldImage = mysqli_query($db, $query);
                                while($row = mysqli_fetch_assoc($oldImage))
                                {
                                  $existingImage = $row['$image'];
                                  unlink("dist/img/users" . $existingImage);
                                }

                                // upload new image

                                $image_name     =rand(1,999999) .  '_' . $image;
                                move_uploaded_file ($image_temp, "dist/img/users/$image_name");

                                $sql ="UPDATE users SET fullname='$fullname',email='$email', password='$hassedPass', phone='$phone', address='$address', image='$image_name',role='$role',status='$status' WHERE user_id='$user_id'";

                                $updateUser = mysqli_query($db, $sql);
                                if($updateUser)
                                {
                                   header("Location:users.php?do=Manage");
                                }
                                else{
                                    die("MySQLi Error. " . mysqli_error($db));
                                }

                          }
                          // only password with alll data changes
                          elseif(!empty($password) && empty($image) )
                          {
                              // New password checked & encrypted
                              if($password == $repassword)
                              {
                                $hassedPass = sha1($password);
                              }

                              $sql ="UPDATE users SET fullname='$fullname',email='$email', password='$hassedPass', phone='$phone', address='$address', role='$role',status='$status' WHERE user_id='$user_id'";

                              $updateUser = mysqli_query($db, $sql);
                              if($updateUser)
                              {
                                 header("Location:users.php?do=Manage");
                              }
                              else{
                                  die("MySQLi Error. " . mysqli_error($db));
                              }
                          }
                          // only image all data cahnges
                          elseif(!empty($image) && empty($password))
                          {
                             
                             // Delete image if already exists
                             $query = "SELECT * FROM users WHERE user_id = '$user_id'";
                             $oldImage = mysqli_query($db, $query);
                             while($row = mysqli_fetch_assoc($oldImage))
                             {
                               $existingImage = $row['$image'];
                               unlink("dist/img/users" . $existingImage);
                             }

                             // upload new image

                             $image_name     =rand(1,999999) .  '_' . $image;
                             move_uploaded_file ($image_temp, "dist/img/users/$image_name");

                             $sql ="UPDATE users SET fullname='$fullname',email='$email', phone='$phone', address='$address', image='$image_name',role='$role',status='$status' WHERE user_id='$user_id'";

                             $updateUser = mysqli_query($db, $sql);
                             if($updateUser)
                             {
                                header("Location:users.php?do=Manage");
                             }
                             else{
                                 die("MySQLi Error. " . mysqli_error($db));
                             }
                          }
                          //only changes the data
                          elseif(empty($image) && empty($password))
                          {
                            
                            $sql ="UPDATE users SET fullname='$fullname',email='$email', password='$hassedPass', phone='$phone', address='$address', image='$image_name',role='$role',status='$status' WHERE user_id='$user_id'";

                              $updateUser = mysqli_query($db, $sql);
                              if($updateUser)
                              {
                                 header("Location:users.php?do=Manage");
                              }
                              else{
                                  die("MySQLi Error. " . mysqli_error($db));
                              }
                          }

                     }
                  }

                  elseif( $do == "Delete" )
                  {
                      if(isset($_GET['user_id']))
                      {
                        $deleteID = $_GET['user_id'];
                        //delete sql command
                        $sql = "DELETE FROM users WHERE user_id = '$deleteID'";
                        $deleteData = mysqli_query($db, $sql);
                        if($deleteData)
                        {
                          header("Location:users.php?do=Manage");
                        }
                        else{
                          
                          die("MySQLi Error. " . mysqli_error($db));

                        }

                      }
                  }

               ?>

     

          </div>
        </div>
    </div>
  </section>
</div>




<?php include "inc/footer.php" ; ?>