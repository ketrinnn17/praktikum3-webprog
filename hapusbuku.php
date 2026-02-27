<?php
include 'connection.php';
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM buku WHERE id=?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
