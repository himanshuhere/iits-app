<?php  
require 'connect.inc.php';
session_start();

?>  


<?php
if(isset($_POST['submitbtn'])) // it checks whether the user clicked login button or not 
{
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
     $dob = $_POST['dob'];
     $course = $_POST['course'];
     $batch = $_POST['batch'];
     $phone = $_POST['phone'];
     $clg = $_POST['clg'];
     $id = substr($fname,0,3).substr($clg,0,3).substr($course,0,3);
     
     $sql1 = "select * from fees where course='$course'";
     $res = $conn->query($sql1);
     if ($res->num_rows == 1) 
         $row1 = $res->fetch_assoc();

         $amt = $row1["amt"];
     

     $sql = "INSERT INTO student(fname, lname, id, email, dob, course, batch, phone, clg, rem)
VALUES ('$fname', '$lname', '$id', '$email', '$dob', '$course', '$batch', '$phone', '$clg', '$amt')";

if (mysqli_query($conn, $sql)) {
    echo "im here";
    //echo "<script type='text/javascrit'>$(document.ready(function(){alert('Submitted Data');})</script>";
    header("Location: adminhome.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
     
}
 ?>