<?php
include "koneksi.php";
session_start();

if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $koneksi->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

header("Location: tabel_users.php");
?>
