<?php
session_start();
require_once 'php/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login terlebih dahulu.";
    exit;
}

$notif = null;

if (isset($_SESSION['notif'])) {
    $notif = $_SESSION['notif'];
    unset($_SESSION['notif']);
}

$user_id = $_SESSION['user_id'];

// Ambil data pendaftaran dari database
$key = $koneksi->prepare("SELECT * FROM pendaftaran_kpr WHERE id_user = ? ORDER BY nomor_pendaftaran DESC LIMIT 1");
$key->bind_param("i", $user_id);
$key->execute();
$result = $key->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="css/hasil.css">
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
    <div class="container">
        <h1>Hasil Pendaftaran KPR</h1>

        <?php if ($data): ?>
            <div class="card">
                <table>
                    <tr>
                        <td><strong>Nomor Pendaftaran</strong></td>
                        <td>:</td>
                        <td><?= $data['nomor_pendaftaran'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>:</td>
                        <td><?= htmlspecialchars($data['nama_lengkap']) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td>:</td>
                        <td><?= htmlspecialchars($data['alamat']) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Pekerjaan</strong></td>
                        <td>:</td>
                        <td><?= htmlspecialchars($data['pekerjaan']) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tipe Rumah</strong></td>
                        <td>:</td>
                        <td><?= $data['tipe_rumah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jangka Waktu</strong></td>
                        <td>:</td>
                        <td><?= $data['jangka_waktu'] ?> Tahun</td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah DP</strong></td>
                        <td>:</td>
                        <td>Rp <?= number_format($data['dp'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td><strong>Total Harga</strong></td>
                        <td>:</td>
                        <td>Rp <?= number_format($data['total_harga'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td><strong>Cicilan per Bulan</strong></td>
                        <td>:</td>
                        <td>Rp <?= number_format($data['cicilan_per_bulan'], 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td>:</td>
                        <td><span class="status">Belum Disetujui</span></td>
                    </tr>
                </table>
                <a href="dashboard.php" class="btn">Kembali ke Dashboard</a>
            </div>

        <?php else: ?>
            <div class="notfound">
                <p>Belum ada pendaftaran yang dilakukan.</p>
                <p><a href="dashboard.php" class="btn">Kembali ke Dashboard</a></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>