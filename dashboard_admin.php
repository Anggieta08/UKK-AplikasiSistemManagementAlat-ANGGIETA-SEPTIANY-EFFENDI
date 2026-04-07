<?php
session_start();
include "../koneksi.php"; 

// [JAWABAN]: Cek session untuk keamanan, memastikan hanya admin yang bisa akses
if ($_SESSION['role'] != "admin") {
    header("location:../login.php"); 
    exit();
}

// [JAWABAN]: Mengambil nama file aktif untuk logika 'active' pada menu sidebar
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        /* KONSISTENSI WARNA: Abu-abu (#f4f4f4), Biru (Active), dan Hitam (Teks) */
        body { font-family: Arial, sans-serif; margin: 0; background-color: #ffffff; }
        .wrapper { display: flex; min-height: 100vh; }

        /* SIDEBAR KONSISTEN */
        .sidebar { width: 230px; background-color: #f4f4f4; border-right: 1px solid #ccc; padding: 20px; }
        .sidebar-brand { font-weight: bold; font-size: 18px; margin-bottom: 30px; padding-bottom: 10px; border-bottom: 2px solid #333; text-align: center; }
        
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 12px; }
        .sidebar ul li a { text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 4px; font-size: 14px; }
        .sidebar ul li a:hover { background-color: #e0e0e0; }

        /* [JAWABAN]: Warna Biru sebagai penanda menu yang sedang aktif/dibuka */
        .active { background-color: #007bff !important; color: #ffffff !important; font-weight: bold; }

        /* KONTEN */
        .main-content { flex: 1; padding: 40px; }
        .header-title { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 10px; }

        /* TABEL STATISTIK */
        .stats-table { width: 100%; border-collapse: collapse; }
        .stats-table td { border: 1px solid #ccc; padding: 30px; text-align: center; width: 50%; background-color: #fafafa; }
        .stats-number { font-size: 36px; font-weight: bold; display: block; color: #007bff; }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-brand">Dashboard Admin</div>
        <ul>
            <li><a href="dashboard_admin.php" class="<?php echo ($current_page == 'dashboard_admin.php') ? 'active' : ''; ?>">Dashboard</a></li>
            <li><a href="data_alat.php" class="<?php echo ($current_page == 'data_alat.php') ? 'active' : ''; ?>">Data Alat</a></li>
            <li><a href="data_user.php" class="<?php echo ($current_page == 'data_user.php') ? 'active' : ''; ?>">Data User</a></li>
            <li><a href="kategori.php" class="<?php echo ($current_page == 'kategori.php') ? 'active' : ''; ?>">Kategori</a></li>
            <li><a href="alat_masuk.php" class="<?php echo ($current_page == 'alat_masuk.php') ? 'active' : ''; ?>">Alat Masuk</a></li>
            <li><a href="pengembalian.php" class="<?php echo ($current_page == 'pengembalian.php') ? 'active' : ''; ?>">Pengembalian</a></li>
            <li><a href="peminjaman.php" class="<?php echo ($current_page == 'peminjaman.php') ? 'active' : ''; ?>">Peminjaman</a></li>
            <li><a href="log_aktifitas.php" class="<?php echo ($current_page == 'log_aktifitas.php') ? 'active' : ''; ?>">Log Aktifitas</a></li>
            <hr>
            <li><a href="../logout.php" style="color: #d9534f;">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-title">
            <h1>Dashboard</h1>
            <p>Selamat Datang, <b><?php echo $_SESSION['username']; ?></b></p>
        </div>
        
        <table class="stats-table">
            <tr>
                <td><span class="stats-number">0</span>Total Alat</td>
                <td><span class="stats-number">0</span>Alat Dipinjam</td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>