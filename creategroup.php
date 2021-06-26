<?php
header("Access-Control-Allow-Origin: *");

$servername = "sql6.freemysqlhosting.net";
$username = "sql6421464";
$ppassword = "RHtznRdc5w";
$dbname = "sql6421464";

$Huser =$_GET["Huser"];
$Gname = $_POST['Gname'];
$Gdesc =$_POST["groupdesc"];
$owner =$_POST["owner"];




$conn = new mysqli($servername, $username, $ppassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql ="SELECT User_id FROM `user` WHERE Username="."'$owner'";
//$result = $conn->query($sql);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $OwnerID=$row['User_id'];
      }
    $sql2 ="INSERT INTO `groups`( `OwnerId`, `GroupName`, `GroupDesc`) VALUES ('".$OwnerID."','".$Gname."','".$Gdesc."')"; 
    if ($conn->query($sql2) === TRUE) {
       // header('Location: ./webpage/mainpage.html?name='.$Huser.'&group='.$Gname);
       echo "pp" .$Huser;
      //  header("Location: http://localhost/unity/webpage/mainpage.html?name=$Huser&group=$Gname");
        header("Location: https://lian-mao.github.io/FYP-AVON-TRIMIC-SITE/mainpage.html?name=$Huser&group=$Gname");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
 else {
  echo  $conn->error;
}
$conn->close();

?>