<?php
$host = "localhost";
$user = "root"; // ganti sesuai hostingmu
$pass = "";
$db   = "sampahonline";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
