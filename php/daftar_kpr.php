<?php
session_start();
require_once 'koneksi.php'; 

// Cek login
if (!isset($_SESSION['user_id'])) {
    echo "Anda harus login terlebih dahulu.";
    exit;
}

// Fungsi untuk membuat nomor pendaftaran unik
function generateNomorPendaftaran($koneksi) {
    do {
        $nomor = rand(100000, 999999);
        $key = $koneksi->prepare("SELECT 1 FROM pendaftaran_kpr WHERE nomor_pendaftaran = ?");
        $key->bind_param("s", $nomor);
        $key->execute();
        $key->store_result();
    } while ($key->num_rows > 0);
    return $nomor;
}

// Ambil dan sanitasi data dari form
$nama     = htmlspecialchars(trim($_POST['nama']), ENT_QUOTES, 'UTF-8');
$alamat   = htmlspecialchars(trim($_POST['alamat']), ENT_QUOTES, 'UTF-8');
$pekerjaan= htmlspecialchars(trim($_POST['pekerjaan']), ENT_QUOTES, 'UTF-8');
$tipe     = $_POST['tipe_rumah'];
$jangka   = (int) $_POST['jangka_waktu'];
$dp_persen= (float) $_POST['dp'];
$metode   = $_POST['metode_pembayaran'];
$user_id  = $_SESSION['user_id'];

// Validasi tipe rumah
$hargaRumah = [
    "Senja" => 1200000000,
    "Terra" => 1800000000,
    "Sagara" => 2500000000,
    "Verdant" => 2100000000
];

if (!isset($hargaRumah[$tipe])) {
    echo "Tipe rumah tidak valid.";
    exit;
}

$harga = $hargaRumah[$tipe];
$jumlah_dp = $harga * $dp_persen;

// Hitung bunga dan cicilan
$bungaMap = [
    5 => 0.018,
    10 => 0.025,
    15 => 0.03,
    20 => 0.035,
    30 => 0.04
];

if (!isset($bungaMap[$jangka])) {
    echo "Jangka waktu tidak valid.";
    exit;
}

$bunga = $bungaMap[$jangka];
$sisa_pembayaran = $harga - $jumlah_dp;
$total_bunga = $sisa_pembayaran * $bunga;
$total_tagihan = $sisa_pembayaran + $total_bunga;
$cicilan_bulanan = ($total_tagihan / ($jangka * 12))+100000;

// Proses upload KTP
$ext = pathinfo($_FILES['foto_ktp']['name'], PATHINFO_EXTENSION);
$nama_ktp = uniqid("ktp_") . '.' . strtolower($ext);
$lokasi_simpan = '../uploads/' . $nama_ktp;

$allowed_ext = ['jpg', 'jpeg', 'png'];
if (!in_array(strtolower($ext), $allowed_ext)) {
    echo "Format file tidak didukung.";
    exit;
}

if (!move_uploaded_file($_FILES['foto_ktp']['tmp_name'], $lokasi_simpan)) {
    echo "Gagal mengunggah file.";
    exit;
}

// Buat nomor pendaftaran
$nomorPendaftaran = generateNomorPendaftaran($koneksi);

// Simpan ke database menggunakan prepared statement
$key = $koneksi->prepare("INSERT INTO pendaftaran_kpr (
    nomor_pendaftaran, id_user, nama_lengkap, alamat, pekerjaan, tipe_rumah, jangka_waktu, dp, metode_pembayaran, foto_ktp, total_harga, cicilan_per_bulan
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$key->bind_param(
    "sissssissddd",
    $nomorPendaftaran,
    $user_id,
    $nama,
    $alamat,
    $pekerjaan,
    $tipe,
    $jangka,
    $jumlah_dp,
    $metode,
    $nama_ktp,
    $total_tagihan,
    $cicilan_bulanan
);


if ($key->execute()) {
    $_SESSION['notif'] = ['type' => 'success', 'message' => 'Pendaftaran berhasil disimpan.'];
    header("Location: ../hasil_pendaftaran.php");
    exit();
} else {

    $_SESSION['notif'] = ['type' => 'error', 'message' => 'Gagal Menyimpan Data!!!'];
    header("Location: ../daftar.php");
    exit();
}
?>
