<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID buku tidak valid.");
}

$id = $_GET['id'];
$stmt = $koneksi->prepare("SELECT * FROM buku WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$buku) {
    die("Buku dengan ID tersebut tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Edit Buku</h1>
    <form action="aksiedit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($buku['id']); ?>">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Buku:</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?php echo htmlspecialchars($buku['judul']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama_penulis" class="form-label">Penulis:</label>
            <input type="text" name="nama_penulis" id="nama_penulis" class="form-control" value="<?php echo htmlspecialchars($buku['nama_penulis']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="homepage.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
