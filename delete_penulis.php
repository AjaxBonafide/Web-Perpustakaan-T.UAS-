<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header("location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah integer

    try {
        $stmt = $koneksi->prepare("DELETE FROM penulis WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Penulis berhasil dihapus.";
        } else {
            $_SESSION['error'] = "Gagal menghapus penulis.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = "ID penulis tidak ditemukan.";
}

header("location: tabel_penulis.php");
exit;
?>
