<?php
// Menghubungkan ke database
require 'config/database.php';

// Ambil data dari form
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$nohp = mysqli_real_escape_string($conn, $_POST['nohp']);
$pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

// Query insert data
$sql = "INSERT INTO pesan (nama, alamat, nohp, pesan) VALUES ('$nama', '$alamat', '$nohp', '$pesan')";

if (mysqli_query($conn, $sql)) {
  // Redirect kembali ke kontak.php dengan notifikasi sukses
  header("Location: kontak.php?status=sukses");
  exit;
} else {
  echo "Gagal mengirim pesan: " . mysqli_error($conn);
}
?>
