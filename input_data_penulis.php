<?php
include "koneksi.php";
session_start();

if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }

date_default_timezone_set('Asia/Jakarta');
$nama = $_POST['nama'];
$id_buku = $_POST['id_buku'];

$dbh=$koneksi->prepare("INSERT INTO penulis (nama, id_buku) VALUES (?,?)");
$dbh->execute([$nama, $id_buku]);

header("Location: tabel_penulis.php");
?>
