<!DOCTYPE html>

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
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How to Send SMS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

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
             
             <div class="container mt-5">
            <div class="row justify-content-md-center" style="height: max-content;">
                <div class="">
                <h2 class="text-center" style="color:green;">Integration IT Services Pvt Ltd - Message Panel</h2>
                    <h3 class="text-center">Send SMS</h3>
                </div>
            </div>
        </div>        
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <form method="POST" action="sendsmsapi2.php">
                  
                  <label for="lblMobileNumber" >Mobile Number</label>
                  <input type="tel" style="
    font-size: 16px;" name="userMobile" class="form-control" id="number" placeholder="e.g.,9998954420"  required    pattern="[789][0-9]{9}" oninvalid="Please Enter Proper Mobile Number" >
                  
                  <label for="lblMessage">Message</label>
                  <textarea class="form-control" style="
    font-size: 16px;" name="userMessage" required  id="textMessage" rows="3"  placeholder="Enter your message here" maxlength="158"></textarea>     

                  <button type="submit" style="
    font-size: 16px;" name="SubmitButton"class="btn btn-outline-primary mt-3" id="btnSend">Send</button>
                  
                  <button type="button" style="
    font-size: 16px;" class="btn btn-outline-secondary mt-3 ml-3" onclick="clearAllFields()">Clear</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <p  id-"response" class="text-center"></p>
                </div>
            </div>
        </div>

    </div>

    </body>
 </html>
</body>
<script type="text/javascript">
function clearAllFields(){
    number.value="";
    textMessage.value="";
}
</script>
</html>

<?php 
if(isset($_POST['SubmitButton']))
{
$textMessage=$_POST["userMessage"];
$mobileNumber=$_POST["userMobile"];
$apiKey = urlencode('W7EwjHIRQls-8w9GD34RpcUP0QyjFTKHboKB1fpcNP');
   
   // Message details
   $numbers = array($mobileNumber);
   $sender = urlencode('TXTLCL');
   $message = rawurlencode($textMessage);
   $numbers = implode(',', $numbers);
   // Prepare data for POST request
   $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
   // Send the POST request with cURL
   $ch = curl_init('https://api.textlocal.in/send/');
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($ch);
   curl_close($ch);   
   // Process your response here
   echo " <strong><h3 class='text-center' style='align-self:center;color:red;background:white;'>";
   echo $response;
   echo "</h3></strong>";
}    
?>