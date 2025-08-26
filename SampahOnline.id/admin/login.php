<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
  header('Location: dashboard.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin - SampahOnline.id</title>
  <link rel="stylesheet" href="assets/css/admin.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    .password-wrapper,
    .input-wrapper {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .password-wrapper input,
    .input-wrapper input {
      width: 100%;
      padding: 12px 10px;
      padding-right: 40px; /* space for icon mata */
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2rem;
      color: #555;
      user-select: none;
    }
  </style>
</head>
<body class="login-body">

  <div class="login-container">
    <h1>Admin Login</h1>
    <form action="proses_login.php" method="POST">
      <div class="input-wrapper">
        <input type="text" name="username" placeholder="Username" required />
      </div>

      <div class="password-wrapper">
        <input type="password" name="password" id="password" placeholder="Password" required />
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
      </div>
      
      <button type="submit">Login</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggle = document.querySelector('.toggle-password');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggle.textContent = '🙈';
      } else {
        passwordInput.type = 'password';
        toggle.textContent = '👁️';
      }
    }
  </script>

</body>
</html>
