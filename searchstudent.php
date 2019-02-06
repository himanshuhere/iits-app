<?php  
require 'connect.inc.php';
session_start();

?>  
<?php
    
             
    $stu = trim($_GET['stu']);
   

        $sql="select * from student where id='$stu'";
        
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

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
    margin-top: 73px;
    padding: 17px;" id="shadow"> 
             
                <h2 style="color: #011b00a8;">Student Details :</h2>
            
                <table style="     margin-top: -178px;
    margin-left: 153px;
    margin-bottom: 22px;">
                  <tr>
                
                    <td>
                    <h3 style="color:green;">Name :</h3>
              </td>
              <td>
                        <h3><?php echo $row["fname"]." ".$row["lname"];?></h3>
                      </td>
                    </tr>
                        <br>
                        <tr>
                      
                      <td>
                      <h3 style="color:green;">Email : &nbsp </h3>
                </td>
                <td>
                        <h3><?php echo $row["email"];?></h3>
                      </td>
                    </tr>
                    <br>
                    <tr>
                  
                          <td>
                          <h3 style="color:green;">DOB :</h3>
                  </td>
                  <td>
                            <h3><?php echo  $row["dob"];?></h3>
                          </td>
                        </tr>
                        <tr>
                        <br>
                    <tr>
                  
                          <td>
                          <h3 style="color:green;">Phone :</h3>
                  </td>
                  <td>
                            <h3><?php echo $row["phone"];?></h3>
                          </td>
                        </tr>
                        <tr>
                        <br>
                    <tr>
                    <tr>
                  
                  <td>
                  <h3 style="color:green;">College/University :</h3>
          </td>
          <td>
                    <h3><?php echo $row["clg"];?></h3>
                  </td>
                </tr>
                <tr>
                <br>
            <tr>
                  
                          <td>
                          <h3 style="color:green;">Course :</h3>
                  </td>
                  <td>
                            <h3><?php echo $row["course"];?></h3>
                          </td>
                        </tr>
                        <tr>
                        <br>
                    <tr>
                  
                          <td>
                          <h3 style="color:green;">Batch :</h3>
                  </td>
                  <td>
                            <h3><?php echo $row["batch"];?></h3>
                          </td>
                        </tr>
                        <tr>
                      
                      <td>
                      <a href="adminhome.php"><button class="main-btn" id="reg-block-btn" style="    font-size: 17px;
    font-weight: bolder;">Back to Admin Panel</button></a>
                </td>

                    
       </table>

    </div>

    </body>
 </html>
<?php
} 
else { echo "0 results"; }
$conn->close();


?>