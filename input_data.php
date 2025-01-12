<?php
session_start();
include "koneksi.php";

if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }
date_default_timezone_set('Asia/Jakarta');
$judul = $_POST['judul'];
$tahun = $_POST['tahun'];
$id_penulis = $_POST['id_penulis'];
$nama_penulis = $_POST['nama_penulis'];

$dbh=$koneksi->prepare("INSERT INTO buku (judul, tahun, id_penulis, nama_penulis, created_by, created_at) VALUES (?,?,?,?,?,?)");
$dbh->execute([$judul, $tahun, $id_penulis, $nama_penulis, $_SESSION['userid'], date("Y-m-d H:i:s")]);

if (empty($judul) || empty($tahun) || empty($id_penulis) || empty($nama_penulis)) {
    die("Semua data harus diisi.");
}

header("Location: tabel_buku.php");
?>
