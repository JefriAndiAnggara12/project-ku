<?php
require 'config/database.php';

$query = mysqli_query($conn, "SELECT * FROM pesan ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($query)) {
  echo "<div>
          <h3>{$row['nama']}</h3>
          <p>{$row['alamat']}</p>
          <p>{$row['nohp']}</p>
          <p>{$row['pesan']}</p>
        </div>";
}
?>
