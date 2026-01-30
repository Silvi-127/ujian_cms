<?php
include "auth.php";
include "../config.php";

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,
        "INSERT INTO admins (username, password)
         VALUES ('$username', '$password')"
    );

    $msg = "Admin berhasil ditambahkan ✅";
}
?>

<h2>➕ Tambah Admin</h2>

<?php if(isset($msg)) echo "<p>$msg</p>"; ?>

<form method="POST">
    <input name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="simpan">Simpan</button>
</form>

<a href="index.php">← Kembali</a>
