<?php
include 'connection.php';

$data = $conn->query("SELECT * FROM buku")->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Daftar Buku</h2>
<a href="tambahbuku.php">Tambah Buku</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Tahun Terbit</th>
    <th>Penerbit</th>
    <th>Aksi</th>
</tr>

<?php foreach($data as $row): ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['judul']; ?></td>
    <td><?= $row['penulis']; ?></td>
    <td><?= $row['tahun_terbit']; ?></td>
    <td><?= $row['penerbit']; ?></td>
    <td>
        <a href="editbuku.php?id=<?= $row['id']; ?>">Edit</a> | 
        <a href="hapusbuku.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</table>