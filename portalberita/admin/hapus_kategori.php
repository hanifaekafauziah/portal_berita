<?php
include 'koneksi.php';

$id = $_GET['id'];

// ambil gambar (opsional kalau mau dihapus dari folder)
$data = mysqli_query($conn, "SELECT * FROM kategori WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

// hapus data
mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");

// (opsional) hapus file gambar
if(file_exists("assets/images/".$row['gambar'])){
    unlink("assets/images/".$row['gambar']);
}

echo "<script>
    alert('Kategori berhasil dihapus!');
    window.location='index.php?menu=kategori';
</script>";
?>