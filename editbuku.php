<?php
include 'connection.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM buku WHERE id=?");
$stmt->execute([$id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];

    $stmt = $conn->prepare("UPDATE buku SET judul=?, penulis=?, tahun_terbit=?, penerbit=? WHERE id=?");
    $stmt->execute([$judul, $penulis, $tahun_terbit, $penerbit, $id]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Perpustakaan</a>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="tambahbuku.php">Tambah Buku</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h2>Edit Buku</h2>
<form method="POST">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= $buku['judul']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" value="<?= $buku['penulis']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit']; ?>" required>
    </div>
    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" value="<?= $buku['penerbit']; ?>" required>
    </div>
    <button type="submit" name="submit" class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
</body>
</html>
