<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM profile WHERE id=1");
$d = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $titles = $_POST['titles'];
    $bio = $_POST['bio'];

    $update = mysqli_query($conn, "UPDATE profile SET name='$name', titles='$titles', bio='$bio' WHERE id=1");

    if ($update) {
        header("Location: index.php");
    } else {
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-5">
    <div class="container mt-5">
        <h2>Edit Data Profile</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="<?php echo $d['name']; ?>">
            </div>
            <div class="mb-3">
                <label>Titles</label>
                <input type="text" name="titles" class="form-control" value="<?php echo $d['titles']; ?>">
            </div>
            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control" rows="4"><?php echo $d['bio']; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>