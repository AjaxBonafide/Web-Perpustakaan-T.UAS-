<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($id) || empty($username) || empty($email) || empty($password)) {
        die("Semua kolom harus diisi.");
    }

    try {
        $stmt = $koneksi->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: tabel_users.php");
            exit;
        } else {
            die("Gagal menyimpan perubahan. Silakan coba lagi.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: edit_users.php?id=" . $_POST['id']);
    exit;
}
?>
