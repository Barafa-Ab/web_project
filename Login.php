<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Masuk / Daftar</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background-color: #F8E7C6;
      font-family: 'Quicksand', sans-serif;
      margin: 0;
      padding: 0;
      color: #204020;
    }

    nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 5px;
      position: sticky;
      top: 0;
      z-index: 999;
      height: 60px;
      background-color: #F8E7C6;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    nav a {
      position: relative;
      text-decoration: none;
      color: #204020;
      display: inline-block;
    }

    nav a::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -2px;
      width: 0;
      height: 2px;
      background-color: #CFA06E;
      transition: width 0.3s ease;
    }

    nav a:hover::after {
      width: 100%;
    }

    nav li {
      list-style: none;
    }

    nav ul {
      display: flex;
      gap: 2rem;
      padding: 90px;
    }

    nav img {
      width: 180px;
      padding: 30px;
    }



    main {
      min-height: 80vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
      padding: 30px;
      padding-top: 100px;
    }

    .form-container {
      width: 100%;
      max-width: 500px;
      background-color: #cfa06e;
      border-radius: 10px;
      padding: 30px;
      transition: transform 0.6s ease;
      position: absolute;
    }

    form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    form input {
      width: 100%;
      padding: 10px;
      margin: 10px 0 20px;
      border: none;
      border-radius: 5px;
    }

    .button {
      text-align: center;
    }

    button {
      padding: 10px 20px;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #333;
    }

    .switch-buttons {
      position: absolute;
      top: 10px;
      display: flex;
      gap: 20px;
      margin-bottom: 80px; 
      z-index: 3;
    }

    .switch-buttons button {
      background-color: transparent;
      color: #204020;
      font-weight: bold;
      border: 2px solid #204020;
      transition: background-color 0.3s, color 0.3s;
    }

    .switch-buttons button.active,
    .switch-buttons button:hover {
      background-color: #204020;
      color: #fff;
    }

    #form-daftar {
    transform: translateX(0%);
    z-index: 2;
  }

  #form-masuk {
    transform: translateX(200%);
    z-index: 1;
  }

  .show-login #form-daftar {
    transform: translateX(-200%);
    z-index: 1;
  }

  .show-login #form-masuk {
    transform: translateX(0%);
    z-index: 2;
  }

    footer {
      margin-top: 14px;
      background-color: #CFA06E;
      padding: 20px;
      text-align: center;
      color: white;
      font-weight: 500;
    }

  </style>
</head>
<body>

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
    

    <form id="form-daftar" class="form-container" method="POST">
      <h2>Daftar Akun</h2>
      <input type="text" name="username" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="text" name="nohp" placeholder="Nomor HP" required />
      <input type="password" name="password" placeholder="Password" required />
      <div class="button">
        <button type="submit">Daftar</button>
      </div>
    </form>

    <form id="form-masuk" class="form-container" method="POST">
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
