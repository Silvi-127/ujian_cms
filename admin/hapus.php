<?php
include "auth.php";
include "../config.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM papers WHERE id='$id'");

header("Location: index.php");
