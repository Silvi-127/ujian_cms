<?php
include "auth.php";
include "../config.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM papers WHERE id='$id'")
);

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE papers SET
        title='{$_POST['title']}',
        authors='{$_POST['authors']}',
        abstract='{$_POST['abstract']}',
        journal='{$_POST['journal']}',
        year='{$_POST['year']}',
        pdf_link='{$_POST['pdf_link']}'
        WHERE id='$id'
    ");
    header("Location: index.php");
}
?>

<h2>✏️ Edit Artikel</h2>

<form method="POST">
    <input name="title" value="<?= $data['title'] ?>"><br><br>
    <input name="authors" value="<?= $data['authors'] ?>"><br><br>
    <input name="journal" value="<?= $data['journal'] ?>"><br><br>
    <input name="year" value="<?= $data['year'] ?>"><br><br>
    <input name="pdf_link" value="<?= $data['pdf_link'] ?>"><br><br>
    <textarea name="abstract" rows="5"><?= $data['abstract'] ?></textarea><br><br>

    <button name="update">Update</button>
    <a href="index.php">Batal</a>
</form>
