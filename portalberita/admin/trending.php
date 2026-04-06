<?php
include "koneksi.php";

// ambil artikel trending (views terbanyak)
$trending = mysqli_query($conn, "
    SELECT * FROM artikel 
    ORDER BY views DESC 
    LIMIT 10
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Trending Berita</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f5f6fa;
}

.card-berita {
    border-radius: 12px;
    overflow: hidden;
}

.card-berita img {
    height: 200px;
    object-fit: cover;
}

.trending-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: red;
    color: white;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 5px;
}
</style>
</head>

<body>

<div class="container mt-5">

    <h3 class="mb-4">🔥 Trending Berita</h3>

    <a href="index.php" class="btn btn-secondary mb-4">← Kembali</a>

    <div class="row">

        <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($trending)) { 
        ?>

        <div class="col-md-4 mb-4">
            <div class="card card-berita shadow">

                <div style="position:relative;">
                    <!-- ranking -->
                    <div class="trending-badge">
                        #<?= $no++; ?>
                    </div>

                    <!-- gambar -->
                    <img src="gambar/<?= $row['gambar']; ?>" class="card-img-top">
                </div>

                <div class="card-body">
                    
                    <h5>
                        <a href="detail_artikel.php?id=<?= $row['id']; ?>" 
                           style="text-decoration:none; color:black;">
                           <?= $row['judul']; ?>
                        </a>
                    </h5>

                    <small class="text-muted">
                        <?= date('d M Y H:i', strtotime($row['tanggal'])) ?>
                    </small>

                    <p class="mt-2">
                        <?= substr($row['isi'], 0, 100); ?>...
                    </p>

                    <span class="badge bg-primary">
                        👁 <?= $row['views']; ?> views
                    </span>

                </div>

            </div>
        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>