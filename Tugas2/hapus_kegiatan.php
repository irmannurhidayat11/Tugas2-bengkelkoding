<?php
include 'koneksi.php';

$id = $_GET['id'];

// Hapus kegiatan dari database
$query = "DELETE FROM kegiatan WHERE id=$id";
mysqli_query($conn, $query);

// Redirect kembali ke halaman utama
header('Location: index.php');
?>
