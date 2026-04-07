<!DOCTYPE html>
<html>
<head><title>Login - Multiuser</title></head>
<body>
    <center>
        <h2>LOGIN SISTEM PEMINJAMAN</h2>
        <form action="proses_login.php" method="POST">
            <table border="1" cellpadding="10">
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" required></td>
                </tr>
               <tr>
                <td>Password</td>
                <td>: <input type="password" name="password" required></td>
               </tr>
                <tr>
                    <td>Login Sebagai</td>
                    <td>
                    <select name="level">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="peminjam">Peminjam</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" name="login">MASUK</button>
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <a href="index.php">Kembali ke Depan</a>
    </center>
</body>
</html>