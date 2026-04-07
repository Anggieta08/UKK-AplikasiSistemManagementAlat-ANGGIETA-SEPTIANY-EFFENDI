<?php
session_start(); // buat nandain kalau sesi user dimulai, biar sistem inget siapa yang masuk
// include "../koneksi.php"; // ini buat nyambungin kodingan ke database biar datanya bisa muncul

// ini buat ngejagain halaman, kalau yang masuk bukan admin ya dipaksa balik ke login
if ($_SESSION['role'] != "admin") {
    header("location:../login.php"); 
    exit(); // biar kodingan di bawahnya nggak jalan kalau dia bukan admin
}

// ini trik buat tau kita lagi di halaman mana, gunanya buat bikin menu di samping jadi biru
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori - Admin</title>
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
        <div class="sidebar-brand">ADMIN PANEL</div>
        <ul>
            <!-- di tiap baris menu ini ada pengecekan, kalau nama filenya bener maka dipasangin class active -->
            <li><a href="dashboard_admin.php" class="<?php echo ($current_page == 'dashboard_admin.php') ? 'active' : ''; ?>">Dashboard</a></li>
            <li><a href="data_alat.php" class="<?php echo ($current_page == 'data_alat.php') ? 'active' : ''; ?>">Data Alat</a></li>
            <li><a href="data_user.php" class="<?php echo ($current_page == 'data_user.php') ? 'active' : ''; ?>">Data User</a></li>
            <li><a href="kategori.php" class="<?php echo ($current_page == 'kategori.php') ? 'active' : ''; ?>">Kategori</a></li>
            <li><a href="alat_masuk.php" class="<?php echo ($current_page == 'alat_masuk.php') ? 'active' : ''; ?>">Alat Masuk</a></li>
            <li><a href="pengembalian.php" class="<?php echo ($current_page == 'pengembalian.php') ? 'active' : ''; ?>">Pengembalian</a></li>
            <li><a href="peminjaman.php" class="<?php echo ($current_page == 'peminjaman.php') ? 'active' : ''; ?>">Peminjaman</a></li>
            <li><a href="log_aktifitas.php" class="<?php echo ($current_page == 'log_aktifitas.php') ? 'active' : ''; ?>">Log Aktifitas</a></li>
            <hr>
            <!-- logout ini naruhnya di luar folder admin, makanya pake titik dua di depannya -->
            <li><a href="../logout.php" style="color: #d9534f;">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-title">
            <h1>Kategori Alat</h1>
            <p>Daftar kategori untuk mengelompokkan data inventaris.</p>
        </div>

        <button class="btn-add">+ Tambah Kategori Baru</button>

        <table class="data-table">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Nama Kategori</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- ini pesan sementara kalau datanya masih kosong biar tabelnya gak kelihatan error -->
                    <td colspan="3" style="text-align: center; color: gray; font-style: italic; padding: 20px;">
                        Data kategori belum tersedia.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>