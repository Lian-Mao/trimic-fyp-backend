<?php
header("Access-Control-Allow-Origin: *");


$servername = "sql6.freemysqlhosting.net";
$username = "sql6421464";
$password = "RHtznRdc5w";
$dbname = "sql6421464";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `user` WHERE  Role='user' and GroupId is null";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
    echo  nl2br ( ";".$row["Username"].',' . $row["Role"].',' . $row["Rank"].',' . $row["Status"] .',' . $row["User_Id"]);
  }
} else {
  echo "0 results";
}
$conn->close();
?>