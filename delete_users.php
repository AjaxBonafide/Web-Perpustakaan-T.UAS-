<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) {
    header("location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    try {
        $stmt = $koneksi->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Pengguna berhasil dihapus.";
        } else {
            $_SESSION['error'] = "Gagal menghapus pengguna.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = "ID pengguna tidak ditemukan.";
}

header("location: tabel_users.php");
exit;
?>
