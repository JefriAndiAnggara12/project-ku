<?php
session_start();
require '../config/database.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Gunakan prepared statement untuk keamanan
$stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  
  if (password_verify($password, $row['password'])) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $row['username'];
    header("Location: dashboard.php");
    exit;
  } else {
    echo "Password salah.";
  }
} else {
  echo "Username tidak ditemukan.";
}
?>
