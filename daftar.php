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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="css/daftar.css" />

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
    <header class="main-header">
        <img src="images/logokomplit.png" alt="Logo" class="logo">
        <nav>
            <ul class="nav-links">
                <li><a href="dashboard.php">Kembali</a></li>
            </ul>
        </nav>
    </header>


    <main>
        <div class="form-wrapper">
            <h1>Selamat Datang di Halaman Daftar</h1>

            <form action="php/daftar_kpr.php" method="post" enctype="multipart/form-data" class="form-container" id="form-daftar">

                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="alamat">Alamat Lengkap:</label>
                <textarea id="alamat" name="alamat" rows="3" required></textarea>

                <label for="pekerjaan">Pekerjaan:</label>
                <input type="text" id="pekerjaan" name="pekerjaan" required>

                <label for="tipe">Pilih Tipe Rumah:</label>
                <select id="tipe" name="tipe_rumah" required>
                    <option value="">--Pilih Tipe--</option>
                    <option value="Senja">Senja</option>
                    <option value="Terra">Terra</option>
                    <option value="Sagara">Sagara</option>
                    <option value="Verdant">Verdant</option>
                </select>

                <label for="jangka">Jangka Waktu (tahun):</label>
                <select id="jangka" name="jangka_waktu" required>
                    <option value="">--Pilih Jangka Waktu--</option>
                    <option value="5">5 Tahun</option>
                    <option value="10">10 Tahun</option>
                    <option value="15">15 Tahun</option>
                    <option value="15">20 Tahun</option>
                    <option value="15">25 Tahun</option>
                    <option value="15">30 Tahun</option>
                </select>

                <label for="ktp">Upload Foto KTP:</label>
                <input type="file" id="ktp" name="foto_ktp" accept=".jpg,.jpeg,.png" required>

                <label for="dp">Jumlah DP (Rp):</label>
                <select id="dp" name="dp" required>
                    <option value="">--Jumlah Uang Muka--</option>
                    <option value=0.1>10 %</option>
                    <option value=0.15>15 %</option>
                    <option value=0.2>20 %</option>
                    <option value=0.3>30 %</option>
                </select>

                <label for="metode">Metode Pembayaran DP:</label>
                <select id="metode" name="metode_pembayaran" required>
                    <option value="">--Pilih Metode Pembayaran--</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="Kartu Kredit">QRIS</option>
                    <option value="Tunai">Tunai</option>
                </select>

                <div class="button">
                    <button type="submit">Kirim Pendaftaran</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        &copy; 2025 Rumah Impian. All rights reserved.
    </footer>

</body>

</html>