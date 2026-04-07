<?php
session_start(); // mulai sesi biar server tau siapa yang lagi akses sistem

// bagian buat ngecek login, kalau bukan admin ya dilarang masuk dan dibalikin ke login
if ($_SESSION['role'] != "admin") {
    header("location:../login.php"); 
    exit(); // stop kodingan di sini biar gak bocor ke bawah kalau belum login
}

// cari tahu nama file yang lagi dibuka sekarang buat keperluan menu aktif di samping
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log Aktifitas - Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #ffffff; }
        .wrapper { display: flex; min-height: 100vh; }

        .sidebar { width: 230px; background-color: #f4f4f4; border-right: 1px solid #ccc; padding: 20px; }
        .sidebar-brand { font-weight: bold; font-size: 18px; margin-bottom: 30px; border-bottom: 2px solid #333; text-align: center; padding-bottom: 10px; }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 12px; }
        .sidebar ul li a { text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 4px; font-size: 14px; }
        
        .active { background-color: #007bff !important; color: white !important; font-weight: bold; }

        .main-content { flex: 1; padding: 40px; }
        .header-title { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 10px; }

        .data-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .data-table th, .data-table td { border: 1px solid #ccc; padding: 12px; text-align: left; height: 35px; }
        .data-table th { background-color: #f4f4f4; font-size: 14px; }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-brand">ADMIN PANEL</div>
        <ul>
            <!-- bagian ini ngecek otomatis, kalau nama filenya cocok maka menu jadi biru -->
            <li><a href="dashboard_admin.php" class="<?php echo ($current_page == 'dashboard_admin.php') ? 'active' : ''; ?>">Dashboard</a></li>
            <li><a href="data_alat.php" class="<?php echo ($current_page == 'data_alat.php') ? 'active' : ''; ?>">Data Alat</a></li>
            <li><a href="data_user.php" class="<?php echo ($current_page == 'data_user.php') ? 'active' : ''; ?>">Data User</a></li>
            <li><a href="kategori.php" class="<?php echo ($current_page == 'kategori.php') ? 'active' : ''; ?>">Kategori</a></li>
            <li><a href="alat_masuk.php" class="<?php echo ($current_page == 'alat_masuk.php') ? 'active' : ''; ?>">Alat Masuk</a></li>
            <li><a href="pengembalian.php" class="<?php echo ($current_page == 'pengembalian.php') ? 'active' : ''; ?>">Pengembalian</a></li>
            <li><a href="peminjaman.php" class="<?php echo ($current_page == 'peminjaman.php') ? 'active' : ''; ?>">Peminjaman</a></li>
            <li><a href="log_aktifitas.php" class="<?php echo ($current_page == 'log_aktifitas.php') ? 'active' : ''; ?>">Log Aktifitas</a></li>
            <hr>
            <!-- mundur satu folder buat nemuin file logout -->
            <li><a href="../logout.php" style="color: #d9534f;">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-title">
            <h1>Log Aktifitas</h1>
            <p>Daftar riwayat penggunaan sistem oleh admin.</p>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="180">Waktu & Tanggal</th>
                    <th>User</th>
                    <th>Aksi / Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <!-- baris cadangan buat gambaran kalau ada datanya nanti -->
                <tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>3</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>4</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>5</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr>
                    <!-- gabungin 4 kolom jadi satu buat nampilin tulisan pesan di tengah -->
                    <td colspan="4" style="text-align: center; color: gray; font-size: 12px; font-style: italic;">
                        -- Struktur tabel log sudah siap, menunggu data dari database --
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>