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

<h2>Edit Buku</h2>
<form method="POST">
    Judul: <input type="text" name="judul" value="<?= $buku['judul']; ?>" required><br><br>
    Penulis: <input type="text" name="penulis" value="<?= $buku['penulis']; ?>" required><br><br>
    Tahun Terbit: <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit']; ?>" required><br><br>
    Penerbit: <input type="text" name="penerbit" value="<?= $buku['penerbit']; ?>" required><br><br>
    <button type="submit" name="submit">Update</button>
</form>
<br>
<a href="index.php">Kembali</a>