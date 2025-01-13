<?php
include "koneksi.php";

// Ambil data penulis
$stmt = $koneksi->prepare("SELECT * FROM penulis");
$stmt->execute();
$penulisList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penulis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="container mt-5">
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
    <h1>Daftar Penulis</h1>
    <div class="mb-3">
            <a href="input_penulis.php" class="btn btn-success ms-3 mt-3"><i class="bi bi-plus-circle"></i> Tambah Data Penulis</a>
        </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
                <th>ID Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penulisList as $penulis): ?>
                <tr>
                    <td><?php echo htmlspecialchars($penulis['id']); ?></td>
                    <td><?php echo htmlspecialchars($penulis['nama']); ?></td>
                    <td><?php echo htmlspecialchars($penulis['id_buku']); ?></td>
                    <td>
                        <a href="edit_penulis.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                        <a href="delete_penulis.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i> Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
