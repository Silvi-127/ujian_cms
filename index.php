<?php
include "config.php";
echo "Koneksi database berhasil 🎉";
?>


<?php
include "config.php";

$keyword = $_GET['q'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mini Scholar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>📚 Mini Google Scholar</h2>

<form method="GET" class="search-box">
    <input type="text" name="q" placeholder="Cari judul atau penulis..." value="<?= $keyword ?>">
    <button type="submit">Cari</button>
</form>

<?php
$sql = "SELECT * FROM papers 
        WHERE title LIKE '%$keyword%' 
        OR authors LIKE '%$keyword%'
        ORDER BY year DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "<p>Tidak ada artikel ditemukan.</p>";
}

while ($row = mysqli_fetch_assoc($result)):
?>
    <div class="paper">
        <h3>
            <a href="detail.php?id=<?= $row['id'] ?>">
                <?= htmlspecialchars($row['title']) ?>
            </a>
        </h3>

        <p><?= htmlspecialchars($row['authors']) ?></p>

        <p>
            <?= htmlspecialchars($row['journal']) ?> · 
            <?= $row['year'] ?>
        </p>

        <p>
            <?= substr(strip_tags($row['abstract']), 0, 180) ?>...
        </p>
    </div>
<?php endwhile; ?>

</body>
</html>
