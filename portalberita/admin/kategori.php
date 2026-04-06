<?php
include 'koneksi.php';

$data = mysqli_query($conn, "
    SELECT kategori.*, COUNT(artikel.id) as jumlah_artikel
    FROM kategori
    LEFT JOIN artikel ON artikel.kategori_id = kategori.id
    GROUP BY kategori.id
    ORDER BY kategori.id DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Kategori</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<style>
body {
    background:#f5f7fa;
}

.table thead {
    background: linear-gradient(90deg,#1f1f1f,#343a40);
    color:white;
}

.table td, .table th {
    vertical-align: middle;
}

.btn-warning {
    background:#ffc107;
}

.btn-danger {
    background:#dc3545;
}
</style>

</head>
<body>

<div class="container mt-5">

    <h3 class="mb-3">📂 Data Kategori</h3>

    <a href="index.php" class="btn btn-secondary mb-3">← Kembali</a>
    <a href="?menu=tambah_kategori" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <table id="kategoriTable" class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Jumlah Artikel</th>
                <th>Update</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>

            <td>
                <a href="../kategori.php?id=<?= $row['id'] ?>" target="_blank" style="text-decoration:none; font-weight:500;">
                    <?= $row['nama_kategori'] ?>
                </a>
            </td>

            <td class="text-center">
                <span class="badge bg-primary">
                    <?= $row['jumlah_artikel'] ?> Artikel
                </span>
            </td>

            <td class="text-center">
                <?= date('d-m-Y H:i', strtotime($row['updated_at'])) ?>
            </td>

            <td class="text-center">
                <a href="?menu=edit_kategori&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_kategori.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#kategoriTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Tidak ada data",
            "search": "🔍 Cari:",
            "paginate": {
                "previous": "Prev",
                "next": "Next"
            }
        }
    });
});
</script>

</body>
</html>