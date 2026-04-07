<?php
session_start();
// include "../koneksi.php"; 

// [JAWABAN GURU]: Keamanan Berlapis. 
// Mengecek apakah user sudah login dan apakah levelnya 'admin'. 
// Jika bukan admin, akan ditolak (Redireksi) ke login.php.
if ($_SESSION['role'] != "admin") {
    header("location:../login.php"); 
    exit();
}

// [JAWABAN GURU]: Mengambil nama file aktif untuk menandai menu di Sidebar.
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Alat Masuk - Admin</title>
    <style>
        /* KONSISTENSI DESAIN: Menggunakan skema warna yang sama dengan dashboard & data alat */
        body { font-family: Arial, sans-serif; margin: 0; background-color: #ffffff; }
        .wrapper { display: flex; min-height: 100vh; }

        /* Sidebar Styling */
        .sidebar { width: 230px; background-color: #f4f4f4; border-right: 1px solid #ccc; padding: 20px; }
        .sidebar-brand { font-weight: bold; font-size: 18px; margin-bottom: 30px; padding-bottom: 10px; border-bottom: 2px solid #333; text-align: center; }
        
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li { margin-bottom: 12px; }
        .sidebar ul li a { text-decoration: none; color: #333; display: block; padding: 10px; border-radius: 4px; font-size: 14px; }

        /* [JAWABAN GURU]: Warna Biru (#007bff) sebagai identitas visual menu aktif */
        .active { background-color: #007bff !important; color: #ffffff !important; font-weight: bold; }

        .main-content { flex: 1; padding: 40px; }
        .header-title { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 10px; }

        /* [JAWABAN GURU]: Tabel dengan border-collapse agar garis pembatas terlihat tipis dan profesional */
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
            <h1>Riwayat Alat Masuk</h1>
            <p>Mencatat setiap transaksi penambahan stok barang ke dalam sistem.</p>
        </div>

        <button class="btn-add">+ Input Alat Masuk</button>

        <table class="data-table">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Tanggal Masuk</th>
                    <th>Nama Alat</th>
                    <th>Jumlah (Qty)</th>
                    <th>Keterangan / Supplier</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" style="text-align: center; color: gray; font-style: italic; padding: 20px;">
                        Belum ada catatan alat masuk hari ini.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>