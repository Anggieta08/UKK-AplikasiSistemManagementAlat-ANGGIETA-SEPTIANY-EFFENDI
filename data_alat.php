<?php
session_start(); // mulai sesi biar server ngenalin siapa yang lagi login
// include "../koneksi.php"; 

// bagian buat ngecek login, kalau bukan admin ya ditendang balik ke login.php
if ($_SESSION['role'] != "admin") {
    header("location:../login.php"); 
    exit(); // berhenti di sini biar kode bawahnya gak jalan kalau dia bukan admin
}

// ambil nama file ini buat bikin menu di sidebar otomatis nyala biru pas dibuka
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Alat - Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #ffffff; }
        .wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 230px; background-color: #f4f4f4; border-right: 1px solid #ccc; padding: 20px; }
        .sidebar-brand { font-weight: bold; font-size: 18px; margin-bottom: 30px; padding-bottom: 10px; border-bottom: 2px solid #333; text-align: center; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 12px; }
        .sidebar ul li a { text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 4px; font-size: 14px; }
        .sidebar ul li a:hover { background-color: #e0e0e0; }
        .active { background-color: #007bff !important; color: #ffffff !important; font-weight: bold; }
        .main-content { flex: 1; padding: 40px; }
        .header-title { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .data-table th, .data-table td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        .data-table th { background-color: #f4f4f4; font-size: 14px; }
        .btn-add { background-color: #333; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; }
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
            <h1>Data Alat</h1>
            <p>Manajemen inventaris alat sekolah secara terpusat.</p>
        </div>

        <button class="btn-add">+ Tambah Data Baru</button>

        <table class="data-table">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Nama Alat</th>
                    <th>Stok</th>
                    <th>Kategori Alat</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" style="text-align: center; color: gray; font-style: italic; padding: 20px;">
                        Data alat belum tersedia di sistem.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>