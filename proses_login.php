<?php
// 1. Memulai session agar data login bisa disimpan dan digunakan di halaman lain
session_start();

// 2. Menghubungkan script dengan database melalui file koneksi.php
include 'koneksi.php';

// 3. Menangkap data yang dikirim dari form login.php menggunakan metode POST
$user_input = $_POST['username'];
$pass_input = $_POST['password'];
$role_input = $_POST['level']; 

// 4. Perintah SQL untuk mencari data user yang username-nya sesuai input
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user_input'");
$cek = mysqli_num_rows($query);

// 5. LOGIKA PENGECEKAN (Proses Validasi)
if($cek > 0){
    // Mengambil data dari database dalam bentuk array
    $data = mysqli_fetch_assoc($query);
    
    // Cek apakah Password di database SAMA dengan input di form
    if($data['pass'] == $pass_input){
        
        // Cek apakah Role di database SAMA dengan pilihan di form
        if($data['role'] == $role_input){
            
            // JIKA SEMUA BENAR: Simpan data ke SESSION
            $_SESSION['username'] = $data['username'];
            $_SESSION['role']     = $data['role'];

            // 6. PENGARAHAN HALAMAN (REDIRECT)
            // Mengarahkan ke folder masing-masing sesuai role
            if($data['role'] == "admin"){
                header("location:admin/dashboard_admin.php");
            } else if($data['role'] == "petugas"){
                header("location:petugas/dashboard_petugas.php");
            } else if($data['role'] == "peminjam"){
                header("location:peminjam/dashboard_peminjaman.php");
            }
            // Menghentikan script agar proses pengalihan berjalan lancar
            exit();

        } else {
            // Pesan jika peran (role) yang dipilih salah
            echo "<script>alert('Gagal: Peran (Role) tidak sesuai!'); window.location='login.php';</script>";
        }
    } else {
        // Pesan jika password tidak cocok
        echo "<script>alert('Gagal: Password salah!'); window.location='login.php';</script>";
    }
} else {
    // Pesan jika username tidak terdaftar di tabel user
    echo "<script>alert('Gagal: Username tidak ditemukan!'); window.location='login.php';</script>";
}
?>