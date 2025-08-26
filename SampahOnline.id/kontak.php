<?php
include 'includes/header.php';
include 'includes/nav.php';
include 'config/database.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $conn->real_escape_string($_POST['nama']);
  $alamat = $conn->real_escape_string($_POST['alamat']);
  $nohp = $conn->real_escape_string($_POST['nohp']);
  $pesan = $conn->real_escape_string($_POST['pesan']);

  $sql = "INSERT INTO pesan (nama, alamat, nohp, pesan) VALUES ('$nama', '$alamat', '$nohp', '$pesan')";

  if ($conn->query($sql) === TRUE) {
    $success = "Pesan berhasil dikirim!";
  } else {
    $error = "Terjadi kesalahan: " . $conn->error;
  }
}
?>

<link rel="stylesheet" href="assets/css/kontak.css">

<main>
  <section class="kontak-section">
    <div class="kontak-overlay">
      <div class="kontak-container" data-aos="fade-up">
        <h2>Kontak Kami</h2>

        <?php if($success != ""): ?>
          <p class="success"><?php echo $success; ?></p>
        <?php endif; ?>

        <?php if($error != ""): ?>
          <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
          <input type="text" name="nama" placeholder="Nama Lengkap" required>
          <input type="text" name="alamat" placeholder="Alamat" required>
          <input type="tel" name="nohp" placeholder="Nomor HP" required>
          <textarea name="pesan" placeholder="Pesan Anda" required></textarea>
          <button type="submit" class="kirim-button">Kirim Pesan</button>
        </form>
      </div>
    </div>

    <!-- Icon WhatsApp Mengambang -->
    <a href="https://wa.me/+6285211960008" class="wa-floating" target="_blank">
      <i class="fab fa-whatsapp"></i>
    </a>
  </section>
</main>

<?php include 'includes/footer.php'; ?>
