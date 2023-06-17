<?php
echo "Hello";
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "error";
}
session_start(); 
$_SESSION['courses']=$_SESSION['courses']." , Introduction to Machine Learning \n";
$a=$_SESSION['courses'];
// $_SESSION=$a;
$b=$_SESSION['email'];
$c=$_SESSION['pass'];
//Querry
$sql = "UPDATE regis SET courses='$a' WHERE email= '$b' and pass= '$c' " ;
if ($conn->query($sql) === TRUE) {
  //  header("Location:success.html");
// exit();
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "phpmailer\src\Exception.php";
require "phpmailer\src\PHPMailer.php";
require "phpmailer\src\SMTP.php";
echo 'end1';

if(true){
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = "smtp.gmail.com";
$mail->SMTPAuth   = TRUE;
$mail->Username   = "gmail@gmail.com";
$mail->Password   = "password";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPDebug  = 1;  

$mail->setFrom('gmail@gmail.com','Project One');
$mail->addAddress($b);
$mail->isHTML(true);
$mail->Subject="Success";
$mail->Body=" Congratulations ".$fn." ".$ln.", You have successfuly applied to ".$a." in Joe's Learning ! ";
$mail->send();
echo 'end2';

echo ' aaa </br>';
echo " <script>  ; 
document.location.href='success.html';
</script> ";
}

?>
