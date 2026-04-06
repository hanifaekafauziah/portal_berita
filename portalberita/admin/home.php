<div class="container mt-4">

    <h3 class="mb-4">Dashboard Admin</h3>

    <!-- Cards -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card card-dashboard shadow text-center">
                <div class="card-body">
                    <h5>Artikel Berita</h5>
                    <h3>
                        <?php include "total_artikel.php"; ?>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-dashboard shadow text-center">
                <div class="card-body">
                    <h5>Kategori</h5>
                    <h3>
                        <?php include "total_kategori.php"; ?>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-dashboard shadow text-center">
                <div class="card-body">
                    <h5>Trending</h5>
                    <h3>
                        <?php include "trending_24jam.php"; ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Artikel Terbaru -->
    <div class="card mt-4 shadow card-dashboard">
        <div class="card-body">

            <h4 class="mb-4">📰 Artikel Terbaru</h4>

            <?php
            include "koneksi.php";

            $data = mysqli_query($conn, "
                SELECT artikel.*, kategori.nama_kategori 
                FROM artikel
                LEFT JOIN kategori ON artikel.kategori_id = kategori.id
                ORDER BY tanggal DESC
                LIMIT 5
            ");
            ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">

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
                    <?php 
                    $no = 1;
                    while($row = mysqli_fetch_assoc($data)) { 
                    ?>
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
    </div>

</div>