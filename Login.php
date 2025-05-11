<?php
session_start();
$notif = null;

if (isset($_SESSION['notif'])) {
    $notif = $_SESSION['notif'];
    unset($_SESSION['notif']); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Masuk / Daftar</title>

  <link rel="stylesheet" href="css/login.css"/>
  <style>
    .notif-bar {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 9999;
      padding: 15px 25px;
      border-radius: 8px;
      font-weight: bold;
      color: white;
      animation: fadeOut 0.5s ease 3s forwards;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    .notif-bar.success {
      background-color: #28a745;
    }
    .notif-bar.error {
      background-color: #dc3545;
    }
    @keyframes fadeOut {
    to {
      opacity: 0;
      transform: translateX(-50%) translateY(-20px);
    }
    }
  </style>

<script>
  setTimeout(() => {
  const notif = document.querySelector('.notif-bar');
  if (notif) notif.remove();
  }, 4000); //waktu 4s
</script>

</head>
<body>
<?php if ($notif): ?>
  <div class="notif-bar <?= $notif['type'] ?>">
    <?= $notif['message'] ?>
  </div>
<?php endif; ?>
  <header>
    <nav>
      <img src="assets/images/logokomplit.png" alt="logo" />
      <ul>
        <li>Selamat Datang di Halaman Login</li>
      </ul>
    </nav>
  </header>

  <main id="main-container">
    <div class="switch-buttons">
      <button id="btnDaftar" class="active">Daftar</button>
      <button id="btnMasuk">Masuk</button>
    </div>
    

    <form id="form-daftar" class="form-container" method="POST" action="php/register.php">
      <h2>Daftar Akun</h2>
      <input type="text" name="username" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="text" name="nohp" placeholder="Nomor HP" required />
      <input type="password" name="password" placeholder="Password" required />
      <div class="button">
        <button type="submit">Daftar</button>
      </div>
    </form>

    <form id="form-masuk" class="form-container" method="POST" action="php/login.php">
      <h2>Masuk Akun</h2>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <div class="button">
        <button type="submit">Masuk</button>
      </div>
    </form>
  </main>

  <footer>
    &copy; 2025 Rumah Impian. All rights reserved.
  </footer>

  <script>
    const mainContainer = document.getElementById('main-container');
    const btnDaftar = document.getElementById('btnDaftar');
    const btnMasuk = document.getElementById('btnMasuk');

    btnDaftar.addEventListener('click', () => {
      mainContainer.classList.remove('show-login');
      btnDaftar.classList.add('active');
      btnMasuk.classList.remove('active');
    });

    btnMasuk.addEventListener('click', () => {
      mainContainer.classList.add('show-login');
      btnMasuk.classList.add('active');
      btnDaftar.classList.remove('active');
    });
  </script>

</body>
</html>
