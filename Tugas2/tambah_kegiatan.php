<?php
include 'koneksi.php';

// Proses tambah kegiatan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kegiatan = $_POST['kegiatan'];
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    $query = "INSERT INTO kegiatan (kegiatan, tanggal_awal, tanggal_akhir, status) VALUES ('$kegiatan', '$tanggal_awal', '$tanggal_akhir', 0)";
    mysqli_query($conn, $query);

    // Redirect ke halaman utama setelah data disimpan
    header('Location: index.php');
}
?>
