<?php  
require 'connect.inc.php';
session_start();

?>  


<?php
if(isset($_SESSION['username']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location: adminhome.php"); 
 }
else  // it checks whether the user clicked login button or not 
{
     $user = $_GET['username'];
     $pass = $_GET['password'];

     $query="select * from admintable where username='$user' and password='$pass'";
     $query_run=mysqli_query($conn,$query);
     $query_num_rows=mysqli_num_rows($query_run);
      if($query_num_rows == 1)  
         {                                        
          $_SESSION['username']=$user;
          
         header("Location: adminhome.php");
         }
        else
        {
            echo "invalid UserName or Password..";
        }
}
 ?>