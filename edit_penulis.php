<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID penulis tidak valid.");
}

$id = $_GET['id'];
$stmt = $koneksi->prepare("SELECT * FROM penulis WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$penulis = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$penulis) {
    die("Penulis dengan ID tersebut tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Edit Penulis</h1>
    <form action="aksiedit_penulis.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($penulis['id']); ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penulis:</label>
            <input type="text" name="nama" id="nama" class="form-control" 
                   value="<?php echo htmlspecialchars($penulis['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_buku" class="form-label">ID Buku:</label>
            <input type="number" name="id_buku" id="id_buku" class="form-control" 
                   value="<?php echo htmlspecialchars($penulis['id_buku']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="tabel_penulis.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
