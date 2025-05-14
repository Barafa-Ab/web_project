<?php
session_start(); // WAJIB sebelum output HTML
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $nohp     = $_POST['nohp'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $key = $koneksi->prepare("INSERT INTO users (username, email, nohp, password) VALUES (?, ?, ?, ?)");
        $key->bind_param("ssss", $username, $email, $nohp, $password);
        $key->execute();

        $_SESSION['notif'] = ['type' => 'success', 'message' => 'Pendaftaran berhasil!'];
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            $_SESSION['notif'] = ['type' => 'error', 'message' => 'Username atau Email sudah terdaftar!'];
        } else {
            $_SESSION['notif'] = ['type' => 'error', 'message' => 'Pendaftaran gagal: ' . $e->getMessage()];
        }
    }

    header("Location: ../index.php");
    exit();
}
