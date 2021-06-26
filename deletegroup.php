<?php
header("Access-Control-Allow-Origin: *");

$servername = "sql6.freemysqlhosting.net";
$uusername = "sql6421464";
$password = "RHtznRdc5w";
$dbname = "sql6421464";

$groupN=$_POST["groupN"];
$groupId=$_POST["groupId"];
//$score=$_POST["score"];


// Create connection
$conn = new mysqli($servername, $uusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//validate user 

$sql ="DELETE FROM `groups` WHERE GroupName='".$groupN."'" ;

$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
  if($groupId!='x'){

    $sql2= "UPDATE user SET GroupId=null  WHERE GroupId='".$groupId."'";
    if($conn->query($sql2) === TRUE){
      echo "sucess";
    }
  }
  else{
        echo "sucess";
  }
    
   
  } else {
    echo "Error updating record: " . $conn->error;
  }



$conn->close();
?>