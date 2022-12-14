<?php include "inc/header.php" ; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">User Management</li>
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
                    <h3 class="card-title">All Users Manage Page</h3>
    
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
                                <th scope="col">Picture</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">User Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>

                                  <?php  
                                   
                                   $sql = "SELECT * FROM users ORDER BY fullname ASC";

                                   $data= mysqli_query($db,$sql);
                                   $i=0;

                                   while ($row = mysqli_fetch_assoc($data)) 
                                 {             
                                    $user_id       =$row['user_id'];
                                    $fullname      =$row['fullname'];
                                    $email         =$row['email'];
                                    $password      =$row['password'];
                                    $phone         =$row['phone'];
                                    $address       =$row['address'];
                                    $image         =$row['image'];
                                    $role          =$row['role'];
                                    $status        =$row['status'];
                                    $join_date     =$row['join_date'];
                                    $i++;

                                   ?>  

                               <tr>
                                <th scope="row"><?php echo $i;  ?></th>
                                <td>
                                    <?php
                                     if(!empty($image)) { ?>
                                        
                                      <img src="dist/img/users/<?php  echo $image; ?>" width="35">
                                    <?php } 

                                    else{?>
                                       
                                      <img src="dist/img/users/ avatar3.png" width="35">
                                   <?php  }
                                   ?>
                                </td>
                                <td><?php echo $fullname;  ?></td>
                                <td> <?php echo $email;?></td>
                                <td><?php echo $phone;?></td>
                                <td>
                                  <?php
                                   if( $role==1) 
                                   { ?>  
                                     <span class="badge badge-success">Admin </span>
                                  <?php   }

                                else if($role==2)
                                { ?>
                                  
                                  <span class="badge badge-primary">User </span>
                             <?php   }
                                  ?> 
                                </td>
                                <td> 

                                <?php
                                   if( $status==0) 
                                   { ?>  

                                         <span class="badge badge-danger">Inactive </span>

                                <?php   }

                                else if($status==1)
                                { ?>
                                  
                                  <span class="badge badge-success"> Active </span>
                                    

                             <?php   }


                                  ?>

                                </td>
                                <td>

                                <div class="table-action">
                                    <ul>
                                    
                                    <li> <a href="users.php?do=Edit&uid=<?php echo $user_id; ?>"><i class="fa fa-edit"></i></a>
                                    </li>
                                    <li> <a href="users.php?do=Delete&uid=<?php echo $user_id; ?>" data-toggle="modal" data-target="#delUserId<?php echo $user_id;?>"><i class="fa fa-trash"></i></a>
                                    </li>
                                    </ul>

                                    <!-- Modal-->


                                    <div class="modal fade" id="delUserId<?php echo $user_id;  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                 <a href="users.php?do=Delete&user_id=<?php echo $user_id; ?>"  class="btn btn-success">Confirm</a>
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
                          <h3 class="card-title">Add New User</h3>

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
                               <form action="users.php?do=Store" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                 <label>Full Name</label>
                                 <input type="text" name="fullname" class="form-control" placeholder="Your Full Name......" required="required" autocomplete="off">
                                </div>
                                
                
                             <div class="form-group">
                                 <label>Email Address</label>
                                 <input type="email" name="email" class="form-control" placeholder=" Email Address..." required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" name="password" class="form-control" placeholder="Your password..." required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Re-Type Password</label>
                                 <input type="password" name="repassword" class="form-control" placeholder="Your Re-Type Password..." required="required" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Phone</label>
                                 <input type="text" name="phone" class="form-control" placeholder="Phone No..." >
                             </div>
                            </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="address" class="form-control" placeholder=" Your address...">
                                </div>

                                <div class="form-group">
                                   <label>User Role</label>
                                     <select class="form-control" name="role">
                                       <option value="2">Please select User Role</option>
                                       <option value="1">Admin</option>
                                       <option value="2">User</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                   <label>User Status</label>
                                     <select class="form-control" name="status">
                                       <option value="0">Please Select User Status</option>
                                       <option value="1">Active</option>
                                       <option value="0">InActive</option>
                                   </select>
                                  </div>

                              <div class="form-group">
                                <label> Profile picture</label>
                                 <input type="file" name="image" class="form-control-file">
                               </div>

                               <div class="form-group">
                                 <input type="submit" name="addUser" class="btn btn-success btn-mb-0">
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
                    if (isset($_POST['addUser']))
                    { 
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

                       if($password== $repassword) {
                         $hassedPass= sha1($password);

                         if(!empty($image))
                         {
                            
                            $image_name     =rand(1,999999) .  '_' . $image;

                             move_uploaded_file ($image_temp, "dist/img/users/$image_name");
                         
                            $sql ="INSERT INTO users(fullname,email,password, phone,address, image,role,status,join_date) VALUES('$fullname','$email','$hassedPass','$phone','$address','$image_name','$role','$status',now())";
                             
                            $addUser = mysqli_query($db,$sql) ;

                             if($addUser) {
                               header("Location:users.php?do=Manage");
                             } else{

                             }



                         } else{
                            
                          $sql ="INSERT INTO users (fullname,email,password, phone,address, role,status,join_date) VALUES('$fullname','$email','$hassedPass','$phone','$address','$role','$status',now())";
                          $addUser = mysqli_query($db,$sql) ;

                          if($addUser) {
                            header("Location:users.php?do=Manage");
                          }else{
                             die("MySQli Error. "  . mysqli_error($db));
                          }
                         }

         
                       } else {
                         echo "Password Doesn't Match" ;
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

