<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];

    $stmt = $conn->prepare("INSERT INTO buku (judul, penulis, tahun_terbit, penerbit) VALUES (?, ?, ?, ?)");
    $stmt->execute([$judul, $penulis, $tahun_terbit, $penerbit]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
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
<h2>Tambah Buku</h2>
<form method="POST">
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" required>
    </div>
    <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
</body>
</html>
