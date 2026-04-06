<?php
include "koneksi.php";

// ambil 2 kategori trending hari ini
$query = mysqli_query($conn, "
    SELECT 
        kategori.id,
        kategori.nama_kategori,
        SUM(artikel.views) AS total_views
    FROM artikel
    JOIN kategori ON artikel.kategori_id = kategori.id
    WHERE DATE(artikel.tanggal) = CURDATE()
    GROUP BY kategori.id
    ORDER BY total_views DESC
    LIMIT 2
");
?>

<h5>🔥 Kategori Trending Hari Ini</h5>

<?php while($row = mysqli_fetch_assoc($query)) { ?>
    <div class="mb-2">
        <strong><?= $row['nama_kategori']; ?></strong><br>
        <small><?= $row['total_views']; ?> views hari ini</small>
    </div>
<?php } ?>