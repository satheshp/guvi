<?php

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "try";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
    } else {
        $SELECT = "SELECT username, password1 FROM register1 WHERE username = ?  LIMIT 1";

        // Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username); 
        $stmt->execute();
        $stmt->bind_result($username, $storedPassword);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 1) {
            $stmt->fetch();
            if ($password == $storedPassword) {
                echo "register";
                // header('Location: profile.html');
                // Set session variables or redirect to another page
            } else {
                echo "Incorrectpassword";
            }
        } else {
            echo "Emailnotfound";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Both email and password are required";
}
?>
