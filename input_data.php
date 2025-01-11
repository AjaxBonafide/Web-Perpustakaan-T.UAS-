<?php
include "koneksi.php";

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];

$stmt = $koneksi->prepare("INSERT INTO buku (judul, penulis) VALUES (:judul, :penulis)");
$stmt->bindParam(':judul', $judul);
$stmt->bindParam(':penulis', $penulis);
$stmt->execute();

header("Location: homepage.php");
?>
