<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tabel_buku.php">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabel_penulis.php">Penulis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-logout text-white" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="welcome-section">
        <h1 class="welcome-title">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <div class="ornament"></div>
        <p>Explore our library and manage your data with ease.</p>
        <div class="welcome-btn">
            <a href="tabel_penulis.php" class="btn btn-warning btn-lg">Lihat Daftar Penulis</a>
            <a href="tabel_buku.php" class="btn btn-light btn-lg">Lihat Daftar Buku</a>
        </div>
    </div>
</body>
</html>
