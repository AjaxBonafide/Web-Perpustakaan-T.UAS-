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
</head>
<body class="container mt-5">
    <h1>Daftar Penulis</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penulisList as $penulis): ?>
                <tr>
                    <td><?php echo htmlspecialchars($penulis['id']); ?></td>
                    <td><?php echo htmlspecialchars($penulis['nama']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
