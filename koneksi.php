<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "ukk2026_anggieta_septiany_effendi"; // Pastikan ini sama dengan nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi (opsional untuk testing)
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
