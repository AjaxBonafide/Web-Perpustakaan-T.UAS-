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
        $stmt = $koneksi->prepare("UPDATE users SET active = 0 WHERE id = :id AND active = 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Pengguna berhasil dinonaktifkan.";
        } else {
            $_SESSION['error'] = "Gagal menonaktifkan pengguna.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = "ID pengguna tidak ditemukan.";
}
if ($stmt->execute()) {
    echo "
    <script>
        alert('Data berhasil diperbarui!');
        window.location.href = 'homepage.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data gagal diperbarui!');
        window.location.href = 'homepage.php';
    </script>";
}

header("location: tabel_users.php");
exit;
?>
