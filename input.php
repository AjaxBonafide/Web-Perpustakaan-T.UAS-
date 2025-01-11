<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
</head>
<body>
    <form action="input_data.php" method="POST">
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" id="judul" required><br>
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
