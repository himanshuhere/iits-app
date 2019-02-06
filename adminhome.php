<?php   require 'connect.inc.php';
session_start();  ?>


<?php
      if(!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
       {
           header("Location:index.html");  
       }
       else
       {
       $userid=$_SESSION['username'];
       $query="select name from admintable where username='$userid'";
       if($query_run=mysqli_query($conn,$query))
       {
          $row=mysqli_fetch_assoc($query_run);
          $username=$row['name'];
            
       }
       else
       {
        echo "abc";
       }  
          
        }
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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<style>

</style>
	</head>
	<body>
	<div class="admin-panel clearfix">
     <div class="slidebar">
        <div class="logo">
	  <a href=""></a>
	  <h4 style="    position: relative;
    top: 64px;">Welcome <?php echo " ".$username." " ?></h4>
        </div>
    <ul>
      <li><a href="#dashboard" id="targeted">Profile</a></li>
      <li id="rrr"><a href="">Register a student</a></li>
      <!-- <li><a href="#media">View Students</a></li>
      <li><a href="#pages">Account View</a></li>
      <li><a href="#links">Links</a></li> -->
      <!-- <li><a href="#comments">comments</a></li>
      <li><a href="#widgets">widgets</a></li>
      <li><a href="#plugins">plugins</a></li>
      <li><a href="#users">users</a></li>
      <li><a href="#tools">tools</a></li> -->
      <li><a href="sendsmsapi2.php">Send Message</a></li>
    </ul>

  
                  
                
    <a href="payfees.php" ><button class="main-btn" id="view-reg-btn" style="     font-size: 14px;
    font-weight: bolder;
    margin: 28px;
    width: 199px;
    background: #777;">Pay Fees</button></a>
             

             <a href="showdata.php" ><button class="main-btn" id="view-reg-btn" style="    font-size: 14px;
    font-weight: bolder;
    margin: 28px;
    background: #0f5f0fb8;">View Registrations</button></a>


     </div>
  <div class="main">
    <ul class="topbar clearfix">
      <li><a href="index.html">IITS</a></li>
      <li><button class="btn-success" style="      background-color: transparent;
    font-size: ;
    color: cadetblue;
    font-size: 18px;
    font-family: unset;
    border: 0px;
    margin: 10px;
    font-weight: 700;" onclick="foo()">Sign Out</button></li>
      <li><a href="#">+</a></li>
    
      <li><form class="form" action="searchstudent.php" style="    height: 33px;
    background: white;
    border: 1px solid #00000030;
    margin: 10px;
    margin-right: 34px;"><input type="text" placeholder="Search student" name="stu" required></li>
     <li><input type="submit" value="Go" style="    height: 33px;
    width: 71px;
    background: white;
    border: 1px solid #00000030;
    margin: 10px;
    margin-right: 23px;"></form></li>
    </ul>

  <div class="main-content2" style="margin: 58px;
        width: max-content;
    font-size: 23px;" id="view-reg-block"> 
              <div style="    margin: -29px;">
                <h2 style="color: #011b00a8;">Admin Panel :</h2>
              </div>
                <table>
                  <tr>
                
                    <td>
                    <h3 style="color:green;">Role :</h3>
              </td>
              <td>
                        <h3>Administrator</h3>
                      </td>
                    </tr>
                        <br>
                        <tr>
                      
                      <td>
                      <h3 style="color:green;">Location : &nbsp </h3>
                </td>
                <td>
                        <h3>Bhopal</h3>
                      </td>
                    </tr>
                    <br>
                    <tr>
                  
                          <td>
                          <h3 style="color:green;">Status :</h3>
                  </td>
                  <td>
                            <h3>Online</h3>
                          </td>
                        </tr>
                        <tr>
                      
                      <td>
                      <button class="main-btn" id="reg-block-btn" style="font-size: 12px;font-weight: bolder;">Register a student</button>
                </td>

                    
       </table>


 
  <!-- contact form -->
       <div class="col-md-8 col-md-offset-2" id="reg-block" style="    position: relative;
                top: -266px;
                left: 346px;
                width: 509px;
                height: 470px;
                background-color: white;
                border-radius: 13px;
                border: 0.5px solid #0000001c;
                display:none;
            }">
                      <form class="contact-form" method="POST" action="regdatainsert.php">
                                      <input type="text" class="input" placeholder="First Name" name="fname"  style="background: white; border: 1px solid #0000007a; height: 36px;" required>
                                      <input type="text" class="input" placeholder="Last Name" name="lname"  style="background: white; border: 1px solid #0000007a; height: 36px;" required >
                                      <input type="email" class="input" placeholder="Email" name="email"  style="background: white; border: 1px solid #0000007a; height: 36px;" required>
                                      <input type="text" class="input" placeholder="Phone" name="phone"  style="background: white; border: 1px solid #0000007a; height: 36px;" required>
                                      <input type="text" class="input" placeholder="College/University" name="clg"  style="background: white; border: 1px solid #0000007a; height: 36px;"  required>
                                      <select name="course"  style="    padding: 6px;
                              margin-bottom: 17px;
                              border: 1px solid #00000042;
                              width: 226px;
                              margin-left: 0px;"><option>Course</option>
                                      <option name="JavaSE">JavaSE</option>
                                      <option name="JavaEE">JavaEE</option>
                                      <option name="Python">Python</option>
                                      <option name="weblearning">Web Learning</option>
                                      <option name="springframework"> Spring Framework</option>
                                      <option name="aws">AWS DevOps Engg</option>
                                      <option name="android">Android Devlopment</option>
                                    
                                    </select>
                                    <select name="batch"   style="    padding: 6px;
                              margin-bottom: 17px;
                              width: 240px;    border: 1px solid #00000042;
                              margin-left: 9x;"><option>Batch</option>

                                    <option  name="Morning 11AM">Morning 11AM</option>
                                    <option  name="Noon 1PM">Noon 1PM</option>
                                    <option  name="Noon 2PM">Noon 2PM</option>
                                    <option  name="Evening 5PM">Evening 5PM</option>
                                    </select>
                                    <input type="date" class="input" placeholder="DOB e.g., 31/05/1999" name="dob" style="background: white; border: 1px solid #0000007a; height: 36px;" required>
                                      
                                      <input type="submit" value="Register" name="submitbtn" style="    background: white;
                              border: 1px solid #0000007a;height: 36px; width: 188px;   color: white;    background-color: darkgreen;font-size: 19px; font-family: sans-serif;">
				                </form>
				</div>
				<!-- /contact form -->
   
  </div>
 

     <ul class="statusbar">
       <li><a href=""></a></li>
       <li><a href=""></a></li>
       <li class="profiles-setting"><a href="">+</a></li>
       <li class="logout"><a href="">+</a></li>
     </ul>
   </div>
</div>


<script type="text/javascript">
function foo(){
	window.open('logout.php');
}
</script>

<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <!-- <script type="text/javascript">
  

    $(document).ready(function() {
      $('#view-reg-btn').on('click', function(event) {        
				$('#view-reg-block').toggle('show');
				});
});
</script> -->
</body>
</html>
