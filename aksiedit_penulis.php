<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $id_buku = $_POST['id_buku'];

    try {
        $stmt = $koneksi->prepare("UPDATE penulis SET nama = :nama, id_buku = :id_buku WHERE id = :id");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':id_buku', $id_buku, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: tabel_penulis.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    die("Akses tidak valid.");
}
?>
