<?php  
require 'connect.inc.php';
session_start();

?>  

<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: sans-serif;
   font-size: 17px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
   font-size: 12px;
    font-family: sans-serif;
    padding: 9px;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
 <th>ID</th> 
  <th>First Name</th> 
  <th>Last Name</th>
  <th>DOB</th> 
  <th>Email</th> 
  <th>Phone</th>
  <th>College</th> 
  <th>Batch</th> 
  <th>Course</th>
  <th>Remaining Fee</th>
  <th>Status</th>
 </tr>
 <?php
    $status = 0;
  $sql = "SELECT * FROM student";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
     
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"] .
     "</td><td>" . $row["lname"] . "</td><td>" . $row["dob"] .  "</td><td>" .
      $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" .  $row["clg"] .
       "</td><td>" . $row["batch"] ."</td><td>". $row["course"] . "</td><td>". $row["rem"] 
        ."</td><td> ";
         if((int)$row["rem"] == 0) { 
           echo "<h3 style='color : green;' >";
              echo "PAID";
            echo "</h3>";
         }

            else
            { 
              echo "  <h3 style='color : red;' >"; 
              echo "Remain";
            echo "</h3>";
            }
            echo "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>