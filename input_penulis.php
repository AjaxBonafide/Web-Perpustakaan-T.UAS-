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
    <title>Input Data Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah Data Penulis</h2>
        <p>Masukkan data penulis baru di bawah ini:</p>
        <form action="input_data_penulis.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required><br>
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku:</label>
                <input type="text" class="form-control" name="id_buku" id="id_buku" required><br>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="tabel_users.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
