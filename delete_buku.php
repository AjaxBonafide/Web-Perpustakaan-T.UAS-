<?php
include "koneksi.php";
session_start();

if (!$_SESSION['isLoggedIn']) {
    header("location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    try {
        $stmt = $koneksi->prepare("UPDATE buku SET deleted_at = NOW(), deleted_by = :deleted_by, isdel = 1 WHERE id = :id AND deleted_at IS NULL");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':deleted_by', $_SESSION['user_id'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Data buku berhasil dihapus.";
        } else {
            $_SESSION['error'] = "Gagal menghapus data buku.";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = "ID buku tidak ditemukan.";
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

header("location: tabel_buku.php");
exit;
?>
