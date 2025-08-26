<?php
session_start();
require '../config/database.php';

// Redirect jika tidak login
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: login.php');
  exit;
}

// Ambil data pesan
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM pesan WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Pesan - SampahOnline.id</title>
  <link rel="stylesheet" href="assets/css/admin.css" />
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 0;
    }

    .edit-container {
      max-width: 600px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .edit-container h2 {
      margin-bottom: 20px;
      color: #0056b3;
      text-align: center;
    }

    form input,
    form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .button-group button,
    .button-group a {
      flex: 1;
      text-align: center;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      cursor: pointer;
      text-decoration: none;
      color: white;
      transition: background 0.3s ease;
    }

    .button-update {
      background: #007bff;
    }

    .button-update:hover {
      background: #0056b3;
    }

    .button-back {
      background: #6c757d;
    }

    .button-back:hover {
      background: #5a6268;
    }
  </style>
</head>
<body>

  <div class="edit-container">
    <h2>Edit Pesan</h2>
    <form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
      <input type="text" name="alamat" value="<?= htmlspecialchars($row['alamat']) ?>" required>
      <input type="text" name="nohp" value="<?= htmlspecialchars($row['nohp']) ?>" required>
      <textarea name="pesan" required><?= htmlspecialchars($row['pesan']) ?></textarea>
      
      <div class="button-group">
        <button type="submit" class="button-update">Update</button>
        <a href="dashboard.php" class="button-back">Kembali</a>
      </div>
    </form>
  </div>

</body>
</html>
