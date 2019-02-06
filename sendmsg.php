<?php  
require 'connect.inc.php';
session_start();

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


    <form action="sendmsg.php" method="post">
    <table border="0" align="center">
        <tr>
            <td colspan="2" align="center">
                <font style="font-weight: bold; font-size: 16px;">Compose message</font>
                <br /><br />
            </td>
        </tr>
        <tr>
            <td valign="top">Recipient: </td>
            <td>
                <textarea name="textAreaRecipient" cols="40" rows="2">...</textarea>
            </td>
        </tr>
        <tr>
            <td valign="top">Message text: </td>
            <td>
                <textarea name="textAreaMessage" cols="40" rows="10">...</textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Send">
            </td>
        </tr>
        <tr><td colspan='2' align='center'>

        </td></tr>
    </table>
</form>
                  
                      
                
       </table>
    </div>
    <?php
    if (isset($_POST["textAreaRecipient"]) && $_POST["textAreaRecipient"] == "")
    {
        echo "<font style=\"color: red; font-weight: bold;\">Recipient field mustn't be empty!</font>";
    }
    else if (isset($_POST["textAreaRecipient"]) && $_POST["textAreaRecipient"] != "")
    {
    try
    {
        connectToDatabase();
        if (insertMessage ($_POST["textAreaRecipient"], "SMS:TEXT", $_POST["textAreaMessage"]))
        {
            echo "<font style=\"color: red; font-weight: bold;\">Insert was successful!</font>";
        }
        closeConnection ();
    }
    catch (Exception $exc)
    {
        echo "Error: " . $exc->getMessage();
    }
}

function insertMessage ($recipient, $messageType, $messageText)
{
    $query = "insert into ozekimessageout (receiver,msgtype,msg,status) ";
    $query .= "values ('" . $recipient . "', '" . $messageType . "', '" . $messageText . "', 'send');";
    $result = mysql_query($query);
    if (!$result)
    {
        echo (mysql_error() . "<br>");
        return false;
    }

    return true;
}

function showOutgoingMessagesInTable()
{
    $query = "select id,sender,receiver,senttime,receivedtime,operator,status,msgtype,msg from ozekimessageout;";
    $result = mysql_query($query);
    if (!$result)
    {
        echo (mysql_error() . "<br>");
        return false;
    }

    try
    {
        echo "<table border='1'>";
        echo "<tr><td>ID</td><td>Sender</td><td>Receiver</td>
        <td>Sent time</td><td>Received time</td><td>Operator</td>";
        echo "<td>Status</td><td>Message type</td><td>Message text</td></tr>";
        while ($row = mysql_fetch_assoc($result))
        {
            echo "<tr>";

            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["sender"] . "</td>";
            echo "<td>" . $row["receiver"] . "</td>";
            echo "<td>" . $row["senttime"] . "</td>";
            echo "<td>" . $row["receivedtime"] . "</td>";
            echo "<td>" . $row["operator"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["msgtype"] . "</td>";
            echo "<td>" . $row["msg"] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        mysql_free_result($result);
    }
    catch (Exception $exc)
    {
        echo (mysql_error() . "<br>");
        return false;
    }

    return true;
}
?>

    </body>
 </html>
