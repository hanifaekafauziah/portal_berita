<?php
include "admin/koneksi.php";

$keyword = $_GET['keyword'];

// cek apakah keyword cocok dengan kategori
$cek = mysqli_query($conn, "
    SELECT * FROM kategori 
    WHERE nama_kategori LIKE '%$keyword%'
");

if(mysqli_num_rows($cek) > 0){

    $k = mysqli_fetch_assoc($cek);

    // redirect ke kategori
    header("Location: kategori.php?id=".$k['id']);
    exit;

} else {

    // kalau bukan kategori → cari di artikel
    $data = mysqli_query($conn, "
        SELECT * FROM artikel 
        WHERE judul LIKE '%$keyword%' 
        OR isi LIKE '%$keyword%'
    ");
}
?>

<h3>Hasil Pencarian: <?= $keyword ?></h3>

<?php while($a = mysqli_fetch_assoc($data)) { ?>
    <div>
        <a href="detail.php?id=<?= $a['id']; ?>">
            <?= $a['judul']; ?>
        </a>
    </div>
<?php } ?>