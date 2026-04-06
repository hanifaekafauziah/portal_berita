<?php
include "koneksi.php";

// ambil 5 artikel terbaru + kategori
$data = mysqli_query($conn, "
    SELECT artikel.*, kategori.nama_kategori 
    FROM artikel
    LEFT JOIN kategori ON artikel.kategori_id = kategori.id
    ORDER BY tanggal DESC
    LIMIT 5
");
?>

<div class="card shadow card-dashboard">
    <div class="card-body">

        <h4 class="mb-4">📰 Artikel Terbaru</h4>

        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Views</th>
                </tr>
            </thead>

            <tbody>
            <?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>

                    <td><?= $row['judul']; ?></td>

                    <td class="text-center">
                        <?= $row['nama_kategori'] ?? '-' ?>
                    </td>

                    <td class="text-center">
                        <?= date('d-m-Y H:i', strtotime($row['tanggal'])) ?>
                    </td>

                    <td class="text-center">
                        <?= $row['views']; ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>
</div>