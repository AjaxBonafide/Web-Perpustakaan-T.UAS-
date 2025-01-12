<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);

    if (empty($id) || empty($judul) || empty($penulis)) {
        die("Semua kolom harus diisi.");
    }

    try {
        $stmt = $koneksi->prepare("UPDATE buku SET judul = :judul, penulis = :penulis WHERE id = :id");
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':penulis', $penulis);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: homepage.php");
            exit;
        } else {
            die("Gagal menyimpan perubahan. Silakan coba lagi.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: edit.php?id=" . $_POST['id']);
    exit;
}
?>
