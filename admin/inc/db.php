<?php
 
 $db = Mysqli_connect("localhost" , "root" , "" , "course_app");

 if($db)
 {
   //  echo "Database Connected" ;
 }

 else{
      die( "MySQLi Error. " . mysqli_error($db) );
 }

?>