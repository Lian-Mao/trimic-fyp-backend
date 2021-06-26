<?php

$servername = "sql6.freemysqlhosting.net";
$uusername = "sql6421464";
$password = "RHtznRdc5w";
$dbname = "sql6421464";

$username=$_POST["name"];
$passworduser=$_POST["password"];
$hname=$_GET['hname'];

echo "powerless";
// Create connection
$conn = new mysqli($servername, $uusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM user where username='".$username."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if(password_verify($passworduser,$row["password"])==true){
       // header('Location: ./webpage/mainpage.html?name='.$hname);
     //header("Location:  http://localhost/unity/webpage/mainpage.html?name=".$hname);
    
     //  header(" Access-Control-Allow-Origin: 'https://lian-mao.github.io/FYP-AVON-Adminsite/mainpage.html?name=".$hnamel."'");
       header("Location: https://lian-mao.github.io/FYP-AVON-TRIMIC-SITE/mainpage.html?name=".$hname);
   
      }
      else{
      //  header('Location: ./webpage/login.html?status=fail');
     //  header("Location: http://localhost/unity/webpage/login.html?status=fail");
        header("Location:  https://lian-mao.github.io/FYP-AVON-Adminsite/login.html?status=fail");
      }
  }
} else {
    header("Location:  https://lian-mao.github.io/FYP-AVON-Adminsite/login.html?status=fail");
}
$conn->close();
?>




