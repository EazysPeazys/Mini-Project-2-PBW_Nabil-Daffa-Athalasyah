<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $organization = $_POST['organization'];
    $year = $_POST['year'];
    $img = "assets/" . $_POST['img'];

    $query = "INSERT INTO awards (title, organization, year, img) VALUES ('$title', '$organization', '$year', '$img')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php#achievements");
    } else {
        echo "Gagal menambah data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Achievement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-5">
    <div class="container mt-5">
        <h2>Tambah Achievement Baru</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Judul Penghargaan</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Organisasi</label>
                <input type="text" name="organization" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tahun</label>
                <input type="text" name="year" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Nama File Gambar (contoh: Award_1.jpg)</label>
                <input type="text" name="img" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>