<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database_name = "absensi12_db";

$koneksi = mysqli_connect("localhost", "root", "", "absensi12_db");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
