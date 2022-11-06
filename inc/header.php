<?php
ob_start();
session_start();
include "admin/inc/db.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Management System</title>

    <!-- Bootstrap CDN  CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    
     <!-- JQuery Library File-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Theme CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- jquery ui
    <link rel="stylesheet" href="/code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css"> -->

    <!-- jquery ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    


</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- nav menu start -->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php">Online <span>Course</span></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <!-- main menu start -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">All courses</a>
                                    </li>
                    
                                <?php
                                   if(empty($_SESSION['user_id'])  || empty($_SESSION['email']) )
                                   {?>
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="login.php">SignIn</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="register.php">SignUp</a>
                                        </li>
                                  <?php }

                                  else{?>
                                      <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           <?php
                                                $user_id =  $_SESSION['user_id'] ;
                                                $query = "SELECT * FROM users WHERE user_id = '$user_id'" ;
                                                $userData = mysqli_query($db, $query);
                                                while( $row = mysqli_fetch_assoc($userData) )
                                                {
                                                    $fullname    =$row['fullname'];
                                                    $image       =$row['image'];

                                                    if (!empty($image))
                                                        {?>
                                                            <img src="admin/dist/img/users/<?php echo  $image  ?>" class="img-circle elevation-2" alt="User Image">
                                                        
                                                      <?php echo $fullname;  }
                                                    else
                                                    { ?>
                                                        <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                                                <?php echo $fullname;  }

                                                    
                                                }
                                           ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="order-history.php">Course Item List</a></li>
                                            <li><a class="dropdown-item" href="#">Manage Profile</a></li>
                                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                                        </ul>
                                    </li>
                                 <?php }

                                  ?>


                                  
                                </ul>
                            </div>
                            <!-- main menu start -->
                        </div>
                    </nav>
                    <!-- nav menu start -->
                </div>
            </div>
        </div>
    </header>