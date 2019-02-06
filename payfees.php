<?php  
require 'connect.inc.php';
session_start();

?>  
<?php
    
             
    $id1 = trim($_GET['id']);
    $id = strtolower($id1);
    $fees = (int)trim($_GET['fees']);
    $error = " ";
    $error1 = " ";
    $rem = 0;
    

        $sql="select * from student where id='$id'";
        
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                
                    $amt = $row["rem"];

                    if($fees > $amt){ 
                    $error = "More than actual amount of the course.";
                    }
                    else{ 
                    $rem = $amt - $fees;
                    
                    }
                    $sql2 = "UPDATE student SET  rem = '$rem' WHERE id = '$id' ;";
                    $conn->query($sql2);
                   
            }
           
            
        
            else{
                $error = "Student with unique Id"." ".$id." "."not present in database. Please re-check entered Id";
                
            }
          // echo "<table><tr><td>".$row["fname"]."</td><td>".$row["lname"] ."</td><td>".$row["dob"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["clg"]."</td><td>".$row["batch"]."</td><td>".$row["course"]."</td></tr>";
            
           // echo "</table>";

   ?>         
            
<html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>	IITS - Integration IT Services Pvt Ltd</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link type="text/css" rel="stylesheet" href="css/admin-style.css" />
    </head>
    <style>
    body{
        background-image : url("./img/background1.jpg");
        background-size : cover;
        background-repeat : no-repeat;
    }

    #shadow
{
    position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
#shadow.:before, .effect7:after
{
    content:"";
    position:absolute;
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:0;
    bottom:0;
    left:10px;
    right:10px;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px;
}
#shadow.:after
{
    right:10px;
    left:auto;
    -webkit-transform:skew(8deg) rotate(3deg);
       -moz-transform:skew(8deg) rotate(3deg);
        -ms-transform:skew(8deg) rotate(3deg);
         -o-transform:skew(8deg) rotate(3deg);
            transform:skew(8deg) rotate(3deg);
}

    </style>
	<body>
    <div class="main-content2" style="    margin-left: 73px;
    font-size: 23px;
    background: white;
    margin-top: 73px;    height: 500px;
    padding: 17px;" id="shadow"> 
             
               


                <table style="margin-top: 74px;
    margin-left: 282px;
    margin-bottom: 22px;">
    <form class="form" action="payfees.php">    
                  <tr>
                
                    <td>
                    <h3 style="color:green;"><label>Enter Student's Unique Id : </label></h3>
              </td>
              <td>
                        <h3><input style="border: 1px solid #0000006e;" type="text" name="id" required></h3>
                      </td>
                    </tr>
                        <br>
                        <tr>
                      
                      <td>
                      <h3 style="color:green;"> <label>Enter Fees Amount : </label></h3>
                </td>
                <td>
                        <h3><input type="text" style="border: 1px solid #0000006e;" name="fees" required></h3>
                      </td>
                    </tr>
                    <td>
                    <input type="submit" style="     font-size: 20px;
    font-weight: bolder;
    width: 151px;
    height: 43px;
    background: white;
    border: 2px solid #00000040;
    color: #006400d9;
    border-radius: 34px;    margin-left: 217px;" value="Pay">

</td>
                        <tr>

                      <td>
                      <div style="height:100px;"></div>
                </td>
</tr></form>  
                        <tr>

                      <td>
                      <a href="adminhome.php"><button class="main-btn" id="reg-block-btn" style="    font-size: 17px;
    font-weight: bolder;">Back to Admin Panel</button></a>
                </td>
</tr>
<h3 style="color:green;"><?php echo $error; ?> </h3>

<h3 style="color:green;"><?php echo $error1; ?> </h3>

                      
       </table>
    </div>

    </body>
 </html>





