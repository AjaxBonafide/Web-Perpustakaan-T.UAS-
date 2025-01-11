<?php
include "koneksi.php";

$id = $_GET['id'];
$stmt = $koneksi->prepare("SELECT * FROM buku WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$buku = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <form action="aksiedit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $buku['id']; ?>">
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" id="judul" value="<?php echo $buku['judul']; ?>" required><br>
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" value="<?php echo $buku['penulis']; ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
