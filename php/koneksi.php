<?php
    $hostname = "localhost"; //alamat server
    $username = "root"; //username default
    $password = "";
    $database = "project";

    $koneksi = new mysqli($hostname, $username, $password, $database);

    if($koneksi->connect_error){
        die('maaf koneksi gagal: '. $koneksi->connect_error);
    }
?>