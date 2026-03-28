<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Contoh menghapus data dari tabel awards
    $query = mysqli_query($conn, "DELETE FROM awards WHERE id=$id");

    if ($query) {
        header("Location: index.php#achievements");
    } else {
        echo "Gagal menghapus data";
    }
}
?>