<?php
include "admin/koneksi.php";

$id = $_GET['id'];

// tambah views
mysqli_query($conn, "
    UPDATE artikel 
    SET views = views + 1 
    WHERE id='$id'
");

// ambil detail
$data = mysqli_query($conn, "
    SELECT a.*, k.nama_kategori 
    FROM artikel a
    JOIN kategori k ON a.kategori_id= k.id
    WHERE a.id='$id'
");

$d = mysqli_fetch_assoc($data);

// trending sidebar
$trending = mysqli_query($conn, "
    SELECT * FROM artikel 
    ORDER BY views DESC 
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= $d['judul']; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }

.topbar {
    background:black;
    color:white;
    padding:8px;
}

.navbar-main {
    background:white;
    border-bottom:1px solid #ddd;
}

.sidebar-item {
    display:flex;
    margin-bottom:15px;
}
.sidebar-item img {
    width:90px;
    height:70px;
    object-fit:cover;
    margin-right:10px;
}

img.main-img {
    width:100%;
    height:400px;
    object-fit:cover;
}
</style>
</head>

<body>

<div class="topbar text-center">
    SSC INSIGHT | Portal Berita Terpercaya
</div>

<div class="navbar-main p-3">
<div class="container d-flex justify-content-between">
    <h4>SSC INSIGHT</h4>
    <a href="index.php">Home</a>
</div>
</div>

<div class="container mt-4">
<div class="row">

<!-- KONTEN -->
<div class="col-md-8">

<h3><?= $d['judul']; ?></h3>
<small class="text-danger"><?= $d['nama_kategori']; ?></small>

<img src="admin/gambar/<?= $d['gambar']; ?>" class="main-img mt-3">

<p class="mt-3"><?= nl2br($d['isi']); ?></p>

<p><b>Dibaca:</b> <?= $d['views']; ?> kali</p>

</div>

<!-- SIDEBAR -->
<div class="col-md-4">

<h5>🔥 Terpopuler</h5>

<?php while($t = mysqli_fetch_assoc($trending)) { ?>
<div class="sidebar-item">
    <img src="admin/gambar/<?= $t['gambar']; ?>">
    <div>
        <a href="detail.php?id=<?= $t['id']; ?>">
            <?= $t['judul']; ?>
        </a>
    </div>
</div>
<?php } ?>

</div>

</div>
</div>

</body>
</html>