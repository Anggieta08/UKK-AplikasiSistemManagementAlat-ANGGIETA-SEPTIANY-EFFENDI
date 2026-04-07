<?php
session_start(); // [PENJELASAN]: Harus dipanggil agar sistem tahu sesi mana yang akan dihapus.

session_unset(); // [PENJELASAN]: Menghapus semua variabel sesi yang terdaftar (seperti username & role).
session_destroy(); // [PENJELASAN]: Menghancurkan seluruh data sesi dari server secara total.

// [PENJELASAN]: Setelah sesi hancur, user diarahkan kembali ke halaman login.
header("location:login.php"); 
exit();
?>