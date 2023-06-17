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


Create database
$sql = "CREATE DATABASE db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


// sql to create table
$sql = "CREATE TABLE zzz (
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  phno int(15) not null,
  dob date,
  email VARCHAR(50),
  pass varchar(50),
  rpass varchar(50),
  interests varchar(300),
  courses LONGTEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table  created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }


//   VALUES ('$_GET[fname]','$_GET[lname]','$_GET[phno]','$_GET[dob]','$_GET[email]','$_GET[password]','$_GET[rpassword]','$_GET[interests]'); 
 


  // $sql = "INSERT INTO `regis` (firstname, lastname,phno,dob, email,pass,rpass, interests)  
  // values ('teail','one',3,4-5-2002,'teail@','pass','pass','int') ";


  // $sql="ALTER TABLE regis
  // add courses longtext  ";

//  $sql="DELETE from regis where courses=NULL";



if ($conn->query($sql) === TRUE) {
    header("Location:success.html");
    // echo "done";
  exit();
  //    echo "  record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
      



?>
  
