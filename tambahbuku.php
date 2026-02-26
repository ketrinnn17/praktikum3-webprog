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

<h2>Tambah Buku</h2>
<form method="POST">
    Judul: <input type="text" name="judul" required><br><br>
    Penulis: <input type="text" name="penulis" required><br><br>
    Tahun Terbit: <input type="number" name="tahun_terbit" required><br><br>
    Penerbit: <input type="text" name="penerbit" required><br><br>
    <button type="submit" name="submit">Tambah</button>
</form>
<br>
<a href="index.php">Kembali</a>