<?php
$server = "localhost";
$user = "admin";
$pass = "kaka123";

$conn = new mysqli($server, $user, $pass);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

else {
  echo "Connection successr"
}

 ?>
