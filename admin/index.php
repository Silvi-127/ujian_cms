<?php
include "auth.php";
include "../config.php";
$result = mysqli_query($conn, "SELECT * FROM papers ORDER BY year DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Mini Scholar</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>📋 Admin Dashboard</h2>

<p>
    <a href="tambah.php">➕ Tambah Artikel</a> |
    <a href="tambah_admin.php">👤 Tambah Admin</a> |
    <a href="../index.php">🔙 Lihat Website</a>
</p>


<p>
    Login sebagai: <b><?= $_SESSION['admin'] ?></b> |
    <a href="logout.php">🚪 Logout</a>
</p>


<p>
    <a href="tambah.php">➕ Tambah Artikel</a> |
    <a href="../index.php">🔙 Lihat Website</a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Tahun</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= $row['year'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a> |
        <a href="hapus.php?id=<?= $row['id'] ?>" 
           onclick="return confirm('Hapus artikel ini?')">🗑 Hapus</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
