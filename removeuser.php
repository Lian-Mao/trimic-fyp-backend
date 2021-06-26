<?php
header("Access-Control-Allow-Origin: *");


$servername = "sql6.freemysqlhosting.net";
$uusername = "sql6421464";
$password = "RHtznRdc5w";
$dbname = "sql6421464";

$username=$_POST["User"];
//$score=$_POST["score"];


// Create connection
$conn = new mysqli($servername, $uusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//validate user 
$sql = "UPDATE user SET GroupId=null  WHERE User_Id='".$username."'";

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "success";
  } else {
    echo "Error updating record: " . $conn->error;
  }



$conn->close();
?>