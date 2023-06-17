<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db";
echo "1";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "error";
}


echo "connection successfull  ";
session_start(); 
    $uname = $_POST['eid'];
    $pass = $_POST['pass'];
    if (empty($uname)) {
        header("Location: login.html?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: login.html?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM regis WHERE email='$uname' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] !== $uname && $row['pass'] === $pass){
                echo '<script>  alert("Incorrect Email ") ; 
            location.replace("login.html")
              </script>'; 
            }

            if ($row['email'] === $uname && $row['pass'] !== $pass){
                echo '<script>  alert("Incorrect  Password") ; 
            location.replace("login.html")
              </script>'; 
            }



            if ($row['email'] === $uname && $row['pass'] === $pass) {
                echo "Logged in!";
                $_SESSION['email'] = $row['email'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['phno'] = $row['phno'];
                $_SESSION['courses']=$row['courses'];
                $_SESSION['pass']=$row['pass'];
                // header("Location: courses login.php");
                // echo $_SESSION['firstname']."</br>".$_SESSION['courses']."</br>". $_SESSION['email'];
                
            }else{
                
          

                echo '<script>  alert("Registraton Succesfull!! \n Login to continue") ; 
                location.replace("login.html")
                </script>'; 
            }
        }else{
           
            echo '<script>  alert("Incorrect Email or Password") ; 
            location.replace("login.html")
              </script>'; 
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
$mail->addAddress($_POST['eid']);
$mail->isHTML(true);
$mail->Subject="Success";
$mail->Body=" Congratulations ".$fn." ".$ln.", You have successfuly Logged in to Joe's Learning ! ";
$mail->send();
echo ' 123 ';
echo " <script>  ; 
document.location.href='courses login.php';
</script> ";
}

?>