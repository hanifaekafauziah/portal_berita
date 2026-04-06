<?php
include "admin/koneksi.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ambil kategori aktif
$kat = mysqli_query($conn, "SELECT * FROM kategori WHERE id='$id'");
$k = mysqli_fetch_assoc($kat);

if(!$k){
    echo "Kategori tidak ditemukan";
    exit;
}

// ambil semua kategori (buat menu navbar)
$menu = mysqli_query($conn, "SELECT * FROM kategori");

// ambil artikel berdasarkan kategori
$data = mysqli_query($conn, "
    SELECT * FROM artikel 
    WHERE kategori_id='$id'
    ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $k['nama_kategori']; ?> - SSC Insight</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }

/* topbar */
.topbar {
    background:black;
    color:white;
    padding:8px;
}

/* navbar */
.navbar-main {
    background:white;
    border-bottom:1px solid #ddd;
}

.menu-link {
    font-weight:600;
    margin-right:15px;
    color:black;
    text-decoration:none;
}
.menu-link:hover { color:red; }

/* card */
.card img {
    height:200px;
    object-fit:cover;
}

.card:hover {
    transform:scale(1.02);
    transition:0.2s;
}

/* section */
.section-title {
    border-left:5px solid red;
    padding-left:10px;
    margin-bottom:20px;
}

/* footer */
.footer {
    background:black;
    color:white;
    padding:20px;
    text-align:center;
    margin-top:40px;
}
</style>

</head>

<body>

<!-- TOPBAR -->
<div class="topbar text-center">
    SSC INSIGHT | Portal Berita Terpercaya
</div>

<!-- NAVBAR -->
<div class="navbar-main p-3">
<div class="container d-flex justify-content-between align-items-center">

    <h4 class="m-0">SSC INSIGHT</h4>

    <div>

        <a href="index.php" class="menu-link">Home</a>

        <!-- LOOP KATEGORI -->
        <?php while($m = mysqli_fetch_assoc($menu)) { ?>
            <a href="kategori.php?id=<?= $m['id']; ?>" class="menu-link">
                <?= $m['nama_kategori']; ?>
            </a>
        <?php } ?>

        <!-- SEARCH -->
        <form class="d-inline-block ms-3" action="search.php" method="GET">
            <input class="form-control form-control-sm" name="keyword" placeholder="Cari...">
        </form>

    </div>

</div>
</div>

<!-- CONTENT -->
<div class="container mt-4">

<h3 class="section-title">
    Kategori: <?= $k['nama_kategori']; ?>
</h3>

<div class="row">

<?php 
if(mysqli_num_rows($data) > 0){
    while($a = mysqli_fetch_assoc($data)){ 
?>
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">

        <!-- GAMBAR -->
        <img src="admin/gambar/<?= $a['gambar']; ?>">

        <div class="card-body">

            <!-- JUDUL -->
            <h6>
                <a href="detail.php?id=<?= $a['id']; ?>">
                    <?= $a['judul']; ?>
                </a>
            </h6>

            <!-- META -->
            <small class="text-muted">
                <?= date('d M Y', strtotime($a['tanggal'])); ?> |
                <?= $a['views']; ?> views
            </small>

            <!-- RINGKASAN -->
            <p class="text-muted mt-2" style="font-size:14px;">
                <?= substr(strip_tags($a['isi']),0,90); ?>...
            </p>

            <!-- BUTTON -->
            <a href="detail.php?id=<?= $a['id']; ?>" class="btn btn-sm btn-danger">
                Baca Selengkapnya
            </a>

        </div>

    </div>
</div>

<?php 
    }
}else{
    echo "<p>Belum ada artikel di kategori ini</p>";
}
?>

</div>

</div>

<!-- FOOTER -->
<?php include "admin/footer.php"; ?>

</body>
</html>