<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID pengguna tidak valid.");
}

$id = $_GET['id'];
$stmt = $koneksi->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$users = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$users) {
    die("Pengguna dengan ID tersebut tidak ditemukan.");
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
    <h1>Edit Pengguna</h1>
    <form action="aksiedit_users.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($users['id']); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($users['username']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($users['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" name="password" id="password" class="form-control" value="<?php echo htmlspecialchars($users['password']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="homepage.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
