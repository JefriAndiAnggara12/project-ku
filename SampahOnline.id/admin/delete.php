<?php
session_start();
require '../config/database.php';

// Cek jika belum login
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: login.php');
  exit;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "DELETE FROM pesan WHERE id=$id");
}

header("Location: dashboard.php");
exit;
?>
