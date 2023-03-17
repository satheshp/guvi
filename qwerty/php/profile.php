<?php

$username = $_POST['username'];
$email  = $_POST['email'];
$password1 = $_POST['age'];
$password2 = $_POST['gender'];




if (!empty($username) || !empty($email) || !empty($password1) || !empty($password2) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "try";



$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From register2 Where email = ? Limit 1";
  $INSERT = "INSERT Into register2 (username , email ,age,gender )values(?,?,?,?)";


     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

    
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $username,$email,$password1,$password2);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>