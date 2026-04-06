<?php
include 'koneksi.php';

// JOIN ke kategori
$data = mysqli_query($conn, "
    SELECT artikel.*, kategori.nama_kategori 
    FROM artikel
    LEFT JOIN kategori ON artikel.kategori_id = kategori.id
    ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Artikel Berita</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<style>
    body {
        background-color: #f5f7fa;
    }
    .table img {
        border-radius: 8px;
    }
</style>
</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">📰 Data Artikel Berita</h3>

    <!-- Tombol kembali -->
    <a href="index.php" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <!-- Tambah artikel -->
    <a href="?menu=tambah_artikel" class="btn btn-primary mb-3">
        + Tambah Artikel
    </a>

    <table id="tabelArtikel" class="table table-bordered table-striped table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php $no = 1; while($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>

                <td class="text-center">
                    <img src="gambar/<?=$row['gambar']; ?>" width="80">
                </td>

                <td><?= $row['judul'] ?></td>

                <td class="text-center">
                    <?= $row['nama_kategori'] ?? '-' ?>
                </td>

                <td>
                    <?= substr($row['isi'], 0, 100) ?>...
                </td>

                <td class="text-center">
                    <?= date('d-m-Y H:i', strtotime($row['tanggal'])) ?>
                </td>

                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="?menu=edit_artikel&id=<?= $row['id'] ?>" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <a href="hapus_artikel.php?id=<?= $row['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data?')">
                           Hapus
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>

</div>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tabelArtikel').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "language": {
            "search": "🔍 Cari:",
            "lengthMenu": "Tampilkan _MENU_ data",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Tidak ada data",
            "paginate": {
                "next": "Next",
                "previous": "Prev"
            }
        }
    });
});
</script>

</body>
</html>