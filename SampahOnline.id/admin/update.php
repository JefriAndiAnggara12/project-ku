<?php
session_start();
require '../config/database.php';

// Cek jika admin belum login
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: login.php');
  exit;
}

// Tangkap data POST
$id = $_POST['id'];
$nama = $conn->real_escape_string($_POST['nama']);
$alamat = $conn->real_escape_string($_POST['alamat']);
$nohp = $conn->real_escape_string($_POST['nohp']);
$pesan = $conn->real_escape_string($_POST['pesan']);

// Query update
$sql = "UPDATE pesan SET 
          nama='$nama', 
          alamat='$alamat', 
          nohp='$nohp', 
          pesan='$pesan' 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  // Redirect kembali ke dashboard setelah update berhasil
  header("Location: dashboard.php");
  exit;
} else {
  echo "Terjadi kesalahan: " . $conn->error;
}
?>
