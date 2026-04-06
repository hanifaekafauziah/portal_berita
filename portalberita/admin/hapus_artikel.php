<?php
include 'koneksi.php';

$id = $_GET['id'];

// ambil data gambar dulu (biar bisa dihapus dari folder)
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM artikel_berita WHERE id=$id"));

// hapus file gambar dari folder
if(file_exists("assets/images/".$data['gambar'])){
    unlink("assets/images/".$data['gambar']);
}

// hapus dari database
mysqli_query($conn, "DELETE FROM artikel_berita WHERE id=$id");

// kembali ke halaman artikel
header("Location: index.php?menu=artikel");
?>