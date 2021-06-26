<?php
header("Access-Control-Allow-Origin: *");


$servername = "sql6.freemysqlhosting.net";
$username = "sql6421464";
$password = "RHtznRdc5w";
$dbname = "sql6421464";

$group1=$_GET['group'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// SELECT     *
// FROM    ((user INNER JOIN groups ON groups.GroupId= user.GroupId)
// INNER JOIN progress ON user.User_Id = progress.User)
// INNER JOIN score ON user.User_Id = score.User
// WHERE  groups.GroupName="jij")
 $sql = "SELECT * FROM((user INNER JOIN groups ON groups.GroupId=user.GroupId) INNER JOIN progress on user.User_Id=progress.User) INNER JOIN score ON user.User_Id= score.User where groups.GroupName="."'$group1'";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
    echo  nl2br ( ";".$row["Username"].',' . $row["Role"].',' . $row["Rank"].',' . $row["Status"] .',' . $row["User_Id"].',' . $row["Score_Elec"].',' . $row["Score_Fire"].',' . $row["Score_Transfer"].',' . $row["Score_total"].',' . $row["FireProg"].',' . $row["ElectProg"].',' . $row["TransfProg"].',' . $row["GroupId"]);
  }
} else {
  echo "0 results";
}
$conn->close();
?>