<?php
session_start(); // mulai sesi biar sistem inget siapa yang lagi login

// buat ngecek kalau yang masuk beneran admin, kalau bukan admin langsung dipindah ke login
if ($_SESSION['role'] != "admin") {
    header("location:../login.php"); 
    exit(); // matiin proses kode di bawahnya kalau dia gak punya akses
}

// ini buat dapet nama file yang lagi dibuka sekarang, gunanya biar menu di sidebar bisa nyala biru otomatis
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #ffffff; }
        .wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 230px; background-color: #f4f4f4; border-right: 1px solid #ccc; padding: 20px; }
        .sidebar-brand { font-weight: bold; font-size: 18px; margin-bottom: 30px; padding-bottom: 10px; border-bottom: 2px solid #333; text-align: center; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 12px; }
        .sidebar ul li a { text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 4px; font-size: 14px; }
        .active { background-color: #007bff !important; color: #ffffff !important; font-weight: bold; }
        .main-content { flex: 1; padding: 40px; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .data-table th, .data-table td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        .data-table th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-brand">Dashboard Admin</div>
            <ul>
                <!-- bagian php di class ini buat ngecek kalau filenya sama dengan yang dibuka, maka menunya jadi biru -->
                <li><a href="dashboard_admin.php" class="<?php echo ($current_page == 'dashboard_admin.php') ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="data_alat.php" class="<?php echo ($current_page == 'data_alat.php') ? 'active' : ''; ?>">Data Alat</a></li>
                <li><a href="data_user.php" class="<?php echo ($current_page == 'data_user.php') ? 'active' : ''; ?>">Data User</a></li>
                <li><a href="kategori.php" class="<?php echo ($current_page == 'kategori.php') ? 'active' : ''; ?>">Kategori</a></li>
                <li><a href="alat_masuk.php" class="<?php echo ($current_page == 'alat_masuk.php') ? 'active' : ''; ?>">Alat Masuk</a></li>
                <li><a href="pengembalian.php" class="<?php echo ($current_page == 'pengembalian.php') ? 'active' : ''; ?>">Pengembalian</a></li>
                <li><a href="peminjaman.php" class="<?php echo ($current_page == 'peminjaman.php') ? 'active' : ''; ?>">Peminjaman</a></li>
                <li><a href="log_aktifitas.php" class="<?php echo ($current_page == 'log_aktifitas.php') ? 'active' : ''; ?>">Log Aktifitas</a></li>
                <hr>
                <!-- arahin link keluar folder admin buat nemu file logout -->
                <li><a href="../logout.php" style="color: #d9534f;">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header-title">
                <h1>Data User</h1>
                <p>Mengelola hak akses pengguna sistem.</p>
            </div>
            
            <!-- bikin struktur tabel buat nampilin daftar user nanti -->
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- pesan sementara kalau databasenya belum dikoneksiin atau datanya masih kosong -->
                        <td colspan="4" align="center"><i>Data kosong.</i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>