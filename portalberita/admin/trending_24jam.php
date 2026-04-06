<?php
include "koneksi.php";

// ambil kategori trending 24 jam terakhir
$query = mysqli_query($conn, "
    SELECT 
        k.nama_kategori,
        SUM(v.views) AS total_views
    FROM views_harian v
    JOIN artikel a ON v.id = a.id
    JOIN kategori k ON a.id = k.id
    WHERE v.tanggal >= NOW() - INTERVAL 1 DAY
    GROUP BY k.id
    ORDER BY total_views DESC
    LIMIT 2
");

// tampilkan jumlah total views (untuk dashboard)
$total = 0;
$data = [];

while($row = mysqli_fetch_assoc($query)){
    $total += $row['total_views'];
    $data[] = $row;
}

// tampilkan total (angka besar di dashboard)
echo $total;
?>