<?php
include "admin/koneksi.php";

// carousel
$slider = mysqli_query($conn, "
    SELECT * FROM artikel 
    ORDER BY tanggal DESC 
    LIMIT 5
");

// trending + kategori
$trending = mysqli_query($conn, "
    SELECT artikel.*, kategori.nama_kategori 
    FROM artikel 
    LEFT JOIN kategori ON kategori.id = artikel.kategori_id
    ORDER BY artikel.views DESC 
    LIMIT 5
");

// terkini
$terkini = mysqli_query($conn, "
    SELECT * FROM artikel 
    ORDER BY tanggal DESC 
    LIMIT 6
");

// kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SSC Insight</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }

/* TOPBAR */
.topbar {
    background:black;
    color:white;
    padding:8px;
    text-align:center;
}

/* NAVBAR */
.navbar-main {
    background:white;
    border-bottom:1px solid #ddd;
    position: sticky;
    top: 0;
    z-index: 999;
}

.menu-link {
    font-weight:600;
    margin-right:15px;
    color:black;
    text-decoration:none;
    transition:0.2s;
}
.menu-link:hover { color:red; }

.navbar-main .d-flex {
    flex-wrap: wrap;
}

/* dropdown */
.dropdown-menu {
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
.dropdown-item:hover {
    background:#f1f1f1;
}

/* section */
.section-title {
    border-left:5px solid red;
    padding-left:10px;
    margin:20px 0 15px;
}

/* carousel */
.carousel-item img {
    height:450px;
    object-fit:cover;
}

/* sidebar */
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

/* card */
.card img {
    height:200px;
    object-fit:cover;
}

a { text-decoration:none; color:black; }
a:hover { color:red; }

/* scroll effect */
.navbar-main.scrolled {
    background:#ffffff;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}
</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    SSC INSIGHT | Portal Berita Terpercaya
</div>

<!-- NAVBAR -->
<div class="navbar-main p-3">
<div class="container d-flex justify-content-between align-items-center">

    <h3 class="m-0 fw-bold">SSC INSIGHT</h3>

    <div class="d-flex align-items-center">

        <?php
        $menu = mysqli_query($conn, "SELECT * FROM kategori");
        $no = 0;
        $dropdown = [];
        ?>

        <a href="index.php" class="menu-link">Home</a>

        <?php while($m = mysqli_fetch_assoc($menu)) { ?>

            <?php if($no < 5) { ?>
                <a href="kategori.php?id=<?= $m['id']; ?>" class="menu-link">
                    <?= $m['nama_kategori']; ?>
                </a>
            <?php } else {
                $dropdown[] = $m;
            } ?>

        <?php $no++; } ?>

        <!-- DROPDOWN -->
        <?php if(count($dropdown) > 0) { ?>
        <div class="dropdown">
            <a class="menu-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                Lainnya
            </a>
            <ul class="dropdown-menu">
                <?php foreach($dropdown as $d) { ?>
                <li>
                    <a class="dropdown-item" href="kategori.php?id=<?= $d['id']; ?>">
                        <?= $d['nama_kategori']; ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>

        <!-- SEARCH -->
        <form class="d-flex ms-3" action="search.php" method="GET">
            <input class="form-control form-control-sm" name="keyword" placeholder="Cari...">
        </form>

    </div>

</div>
</div>

<!-- CONTENT -->
<div class="container mt-4">

<!-- CAROUSEL + TRENDING -->
<div class="row">

    <div class="col-md-8">
        <div id="carouselBerita" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $no=0; foreach($slider as $row) { ?>
                <div class="carousel-item <?= $no==0?'active':'' ?>">
                    <img src="admin/gambar/<?= $row['gambar']; ?>" class="w-100">
                    <div class="carousel-caption text-start">
                        <a href="detail.php?id=<?= $row['id']; ?>">
                            <h3><?= $row['judul']; ?></h3>
                        </a>
                    </div>
                </div>
                <?php $no++; } ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <h5>🔥 Terpopuler</h5>

        <?php while($t = mysqli_fetch_assoc($trending)) { ?>
        <div class="sidebar-item">
            <img src="admin/gambar/<?= $t['gambar']; ?>">
            <div>
                <small class="text-danger"><?= $t['nama_kategori']; ?></small><br>
                <a href="detail.php?id=<?= $t['id']; ?>">
                    <?= $t['judul']; ?>
                </a><br>
                <small>👁 <?= $t['views']; ?> views</small>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

<!-- TERKINI -->
<h4 class="section-title">Terkini</h4>
<div class="row">
<?php while($t = mysqli_fetch_assoc($terkini)) { ?>
<div class="col-md-4">
<div class="card mb-3">
<img src="admin/gambar/<?= $t['gambar']; ?>">
<div class="card-body">
<a href="detail.php?id=<?= $t['id']; ?>">
<h6><?= $t['judul']; ?></h6>
</a>
</div>
</div>
</div>
<?php } ?>
</div>

<!-- PER KATEGORI -->
<?php while($k = mysqli_fetch_assoc($kategori)) { ?>

<h4 class="section-title">
    <a href="kategori.php?id=<?= $k['id']; ?>">
        <?= $k['nama_kategori']; ?>
    </a>
</h4>

<div class="row">
<?php
$id_kat = $k['id'];

$data = mysqli_query($conn, "
    SELECT * FROM artikel 
    WHERE kategori_id='$id_kat'
    LIMIT 3
");

while($a = mysqli_fetch_assoc($data)) {
?>
<div class="col-md-4">
<div class="card mb-3">

<img src="admin/gambar/<?= $a['gambar']; ?>">

<div class="card-body">
<a href="detail.php?id=<?= $a['id']; ?>">
<h6><?= $a['judul']; ?></h6>
</a>
</div>

</div>
</div>
<?php } ?>
</div>

<?php } ?>

</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
window.addEventListener("scroll", function() {
    let nav = document.querySelector(".navbar-main");
    nav.classList.toggle("scrolled", window.scrollY > 10);
});
</script>

<!-- FOOTER -->
<?php include "admin/footer.php"; ?>

</body>
</html>