<?php
session_start();
include "koneksi.php";

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $koneksi->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() == 1) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['isLoggedIn'] = true;
        header("Location: homepage.php");
    } else {
        echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('Email tidak ditemukan!'); window.location.href='login.php';</script>";
}
?>
