<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

require '../config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin - SampahOnline.id</title>
  <link rel="stylesheet" href="assets/css/admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="dashboard-body">

  <nav class="admin-nav">
  <div class="admin-nav-content">
    <h1>Admin Dashboard</h1>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</nav>


  <main class="dashboard-container">
    <h2>Data Pesan Masuk</h2>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>No HP</th>
      <th>Pesan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($conn, "SELECT * FROM pesan ORDER BY id DESC");
    while($row = mysqli_fetch_assoc($query)) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['nama']}</td>
              <td>{$row['alamat']}</td>
              <td>{$row['nohp']}</td>
              <td>{$row['pesan']}</td>
              <td>
                <a href='edit.php?id={$row['id']}' class='btn-edit'>Edit</a>
                <a href='delete.php?id={$row['id']}' class='btn-delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus pesan ini?');\">Hapus</a>
              </td>
            </tr>";
    }
    ?>
  </tbody>
</table>

  </main>

</body>
</html>
