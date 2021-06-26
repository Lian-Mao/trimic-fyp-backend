<?php



$servername = "sql6.freemysqlhosting.net";
$username = "sql6421464";
$ppassword = "RHtznRdc5w";
$dbname = "sql6421464";

$name = $_POST['name'];
$password =$_POST["password"];
$rank =$_POST["rank"];
$conn = new mysqli($servername, $username, $ppassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$hashedpassword=password_hash($password, PASSWORD_BCRYPT);
$sql ="INSERT INTO user (username, password,Role,GroupId, Rank,Status) VALUES ('".$name."','".$hashedpassword."','admin',null,'".$rank."',null)";
$result = $conn->query($sql);

if ($result === TRUE) {
 // header('Location: ./webpage/login.html');
 
  header("Location: http://localhost/unity/webpage/login.html");
}
 else {
  echo  $conn->error;
}
$conn->close();

?>