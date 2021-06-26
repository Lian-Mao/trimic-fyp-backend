<?php
header("Access-Control-Allow-Origin: *");


$servername = "sql6.freemysqlhosting.net";
$username = "sql6421464";
$password = "RHtznRdc5w";
$dbname = "sql6421464";

$username1=$_GET['name'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT groups.GroupName,groups.GroupDesc FROM user inner join groups on user.User_Id=groups.OwnerId WHERE Username="."'$username1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  nl2br ( ";".$row["GroupName"].',' . $row["GroupDesc"]);
  }
} else {
  echo "0 results";
}
$conn->close();
?>