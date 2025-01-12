<?php 
session_start();
if (!$_SESSION['isLoggedIn']) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah Data Buku</h2>
        <p>Masukkan data buku baru di bawah ini:</p>
        <form action="input_data.php" method="POST">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" class="form-control" name="judul" id="judul" required><br>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Tahun Terbit:</label>
                <input type="text" class="form-control" name="tahun" id="tahun" required><br>
            </div>
            <div class="mb-3">
                <label for="id_penulis" class="form-label">ID Penulis:</label>
                <input type="int" class="form-control" name="id_penulis" id="id_penulis" required><br>
            </div>
            <div class="mb-3">
                <label for="nama_penulis" class="form-label">Penulis:</label>
                <input type="text" class="form-control" name="nama_penulis" id="nama_penulis" required><br>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="home.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
