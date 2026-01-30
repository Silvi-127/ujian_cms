<?php
include "auth.php";
include "../config.php";

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO papers 
    (title, authors, abstract, journal, year, pdf_link)
    VALUES (
        '{$_POST['title']}',
        '{$_POST['authors']}',
        '{$_POST['abstract']}',
        '{$_POST['journal']}',
        '{$_POST['year']}',
        '{$_POST['pdf_link']}'
    )");

    header("Location: index.php");
}
?>

<h2>➕ Tambah Artikel</h2>

<form method="POST">
    <input name="title" placeholder="Judul" required><br><br>
    <input name="authors" placeholder="Penulis" required><br><br>
    <input name="journal" placeholder="Jurnal"><br><br>
    <input name="year" placeholder="Tahun"><br><br>
    <input name="pdf_link" placeholder="Link PDF"><br><br>
    <textarea name="abstract" placeholder="Abstrak" rows="5"></textarea><br><br>

    <button name="simpan">Simpan</button>
    <a href="index.php">Batal</a>
</form>
