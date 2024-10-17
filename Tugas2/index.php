<?php
include 'koneksi.php';

// Ambil data dari database
$query = "SELECT * FROM kegiatan";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Membuat tombol status menjadi oval */
        .status-btn {
            border-radius: 50px; /* Nilai besar untuk membuat tombol oval */
            padding: 5px 10px;  /* Tambah padding agar tombol terlihat lebih besar */
        }

        /* Membuat tombol aksi (Ubah dan Hapus) menjadi oval */
        .action-btn {
            border-radius: 50px; /* Nilai besar untuk membuat tombol oval */
            padding: 5px 15px;   /* Tambahkan padding pada tombol aksi */
            margin: 0 5px;       /* Memberikan jarak antar tombol */
        }

        /* Mengatur padding dan margin pada tombol aksi */
        .btn-sm {
            padding: 5px 10px;
            margin: 0 5px;
        }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">To Do List</h2>

        <!-- Form Tambah Kegiatan -->
        <form action="tambah_kegiatan.php" method="POST" class="mb-3">
            <div class="row mb-2">
                <div class="col-md-4">
                    <input type="text" name="kegiatan" class="form-control" placeholder="Kegiatan" required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="tanggal_awal" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <input type="date" name="tanggal_akhir" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </div>
            </div>
        </form>

        <!-- Tabel Kegiatan -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kegiatan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $status = $row['status'] ? 'Selesai' : 'Belum';
                        $buttonClass = $row['status'] ? 'btn-success' : 'btn-warning';
                        $statusId = $row['id']; // ID untuk mengubah status

                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['kegiatan']}</td>
                                <td>{$row['tanggal_awal']}</td>
                                <td>{$row['tanggal_akhir']}</td>
                                <td>
                                    <button class='btn {$buttonClass} status-btn' id='statusBtn{$statusId}' onclick='changeStatus({$statusId})'>
                                        {$status}
                                    </button>
                                </td>
                                <td>
                                    <a href='ubah_kegiatan.php?id={$row['id']}' class='btn btn-info btn-sm action-btn'>Ubah</a>
                                    <a href='hapus_kegiatan.php?id={$row['id']}' class='btn btn-danger btn-sm action-btn'>Hapus</a>
                                </td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Belum ada kegiatan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
