<?php
include "config.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM papers WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Artikel tidak ditemukan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2><?= htmlspecialchars($data['title']) ?></h2>

<p><b>Penulis:</b> <?= htmlspecialchars($data['authors']) ?></p>
<p><b>Jurnal:</b> <?= htmlspecialchars($data['journal']) ?></p>
<p><b>Tahun:</b> <?= $data['year'] ?></p>

<hr>

<p><?= nl2br(htmlspecialchars($data['abstract'])) ?></p>

<?php if ($data['pdf_link']): ?>
    <p>
        📄 <a href="<?= $data['pdf_link'] ?>" target="_blank">
        Download PDF
        </a>
    </p>
<?php endif; ?>

<a href="index.php">← Kembali</a>

</body>
</html>
