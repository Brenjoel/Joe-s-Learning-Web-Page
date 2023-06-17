<script type="text/javascript">
          function validateForm(x) {
            if (x < 999999999) {
              document.write(5);

              // alert("Number must be 10 digits ");
              // location.replace("registration.html")
             var i= <?php  echo 'Hello' ?>;
              alert(i);
            }
          }
          </script>

<?php
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
 

try{
  $fn= $_POST["fname"]; 
  $ln= $_POST["lname"]; 
  $phno=$_POST["phno"];
  $dob=$_POST["dob"];
  $email= $_POST["email"];
  $password=$_POST["password"];
  $rpassword=$_POST["rpassword"];
  $interests=$_POST["interests"];
 // $quali=$_POST["qua"];
}
 catch (mysqli_sql_exception $e) { 
    var_dump($e);
    exit; 
 }
 $sql = "SELECT * FROM regis WHERE email='$email' ";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) === 1) {
     $row = mysqli_fetch_assoc($result);
     if ($row['email'] === $email ) {
         echo '<script>  alert("Email Already please Exists Register with another email") ; 
          location.replace("registration.html")
          </script>'; 
     }
   }
if ($password!=$rpassword){
 echo '<script>  alert("Passwords didnt match") ; 
 location.replace("registration.html")
 </script>'; 
//  redirect("registration.html"); 

}

elseif ($phno<=999999999 ){
 
  echo '<script>  alert("Phone number is less than 10 digits") ; 
  location.replace("registration.html")
  </script>'; 
}

else{

  $sql = " INSERT INTO regis (firstname, lastname,phno,dob, email,pass,rpass, interests,courses)  
 VALUES ('$fn','$ln','$phno','$dob','$email','$password','$rpassword','$interests',' ') ";
      // -- VALUES ('$_POST[fname]','$_POST[lname]','$_POST[phno]','$_POST[dob]','$_POST[email]','$_POST[password]','$_POST[rpassword]','$_POST[interests]',' ')"; 
// echo $fn,$ln,$phno,$dob,$email,$password,$rpassword,$interests;
 if ($conn->query($sql) === TRUE) {
//   echo '<script>  alert("Registraton Succesfull!! \n Login to continue") ; 
//   location.replace("Login.html")
//   </script>'; 
// exit();
     echo "  record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "phpmailer\src\Exception.php";
require "phpmailer\src\PHPMailer.php";
require "phpmailer\src\SMTP.php";

if(isset($_POST['submit'])){
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
$mail->addAddress($_POST['email']);
$mail->isHTML(true);
$mail->Subject="Success";
$mail->Body=" Congratulations ".$fn." ".$ln.", You have successfuly regsistered in Joe's Learning ! ";
$mail->send();

echo " <script> alert('Registration Successfull !!  Login to continue') ; 
document.location.href='login.html';
</script> ";
}
?>
