<?php

include "koneksi.php";
session_start();
if (!$_SESSION['isLoggedIn']) {
    header("location: login.php");
}
$dbh = $koneksi->query("
    SELECT buku.*, penulis.nama AS nama_penulis
    FROM buku
    LEFT JOIN penulis ON buku.id_penulis = penulis.id
    WHERE buku.deleted_at IS NULL
");
$bukus = $dbh->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table-dark th,
        .table-dark td {
            background-color: #343a40;
            color: #fff;
        }

        .table th {
            font-weight: bold;
        }

        .btn {
            padding: 8px 12px;
            font-size: 14px;
        }

        .btn-sm {
            padding: 6px 10px;
        }

        .alert-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="tabel_buku.php">Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tabel_users.php">Pengguna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tabel_penulis.php">Penulis</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="mb-3">
            <a href="input.php" class="btn btn-success ms-3 mt-3"><i class="bi bi-plus-circle"></i> Tambah Data Buku</a>
</div>
<div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Buku</h5>
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tahun Terbit</th>
                            <th>ID Penulis</th>
                            <th>Nama Penulis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($bukus as $row): ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= htmlspecialchars($row['judul']); ?></td>
                                <td><?= htmlspecialchars($row['tahun']); ?></td>
                                <td><?= htmlspecialchars($row['id_penulis']); ?></td>
                                <td><?= htmlspecialchars($row['nama_penulis'] ?? 'Tidak Diketahui'); ?></td>
                                <td>
                                    <a href="edit_buku.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                                    <a href="delete_buku.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>
