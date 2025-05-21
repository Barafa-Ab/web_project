<?php
require 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $key = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
    $key->bind_param("s", $username);
    $key->execute();

    $result = $key->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            
            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION['notif'] = ['type' => 'error', 'message' => 'Password salah!'];
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['notif'] = ['type' => 'error', 'message' => 'User Tidak Ditemukan!'];
        header("Location: ../index.php");
        exit();
    }
} else {
    $_SESSION['notif'] = ['type' => 'error', 'message' => 'Terjadi kesalahan saat login.'];
    header("Location: ../index.php");
    exit();
}
