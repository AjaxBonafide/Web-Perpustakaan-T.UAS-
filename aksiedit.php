<?php
include "koneksi.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];

$stmt = $koneksi->prepare("UPDATE buku SET judul = :judul, penulis = :penulis WHERE id = :id");
$stmt->bindParam(':judul', $judul);
$stmt->bindParam(':penulis', $penulis);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: homepage.php");
?>
