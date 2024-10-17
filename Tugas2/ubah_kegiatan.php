<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil data kegiatan yang akan diubah
$query = "SELECT * FROM kegiatan WHERE id=$id";
$result = mysqli_query($conn, $query);
$kegiatan = mysqli_fetch_assoc($result);

// Proses ubah kegiatan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kegiatan_baru = $_POST['kegiatan'];
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $status = $_POST['status'];

    $query = "UPDATE kegiatan SET kegiatan='$kegiatan_baru', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', status='$status' WHERE id=$id";
    mysqli_query($conn, $query);

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Ubah Kegiatan</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="kegiatan" class="form-control" value="<?= $kegiatan['kegiatan'] ?>" required>
            </div>
            <div class="mb-3">
                <input type="date" name="tanggal_awal" class="form-control" value="<?= $kegiatan['tanggal_awal'] ?>" required>
            </div>
            <div class="mb-3">
                <input type="date" name="tanggal_akhir" class="form-control" value="<?= $kegiatan['tanggal_akhir'] ?>" required>
            </div>
            <div class="mb-3">
                <select name="status" class="form-control">
                    <option value="0" <?= $kegiatan['status'] == 0 ? 'selected' : '' ?>>Belum</option>
                    <option value="1" <?= $kegiatan['status'] == 1 ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</body>
</html>
