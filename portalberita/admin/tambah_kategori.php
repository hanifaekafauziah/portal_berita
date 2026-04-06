<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_kategori'];

    // simpan ke database tanpa gambar
    mysqli_query($conn, "INSERT INTO kategori (nama_kategori) 
    VALUES ('$nama')");

    echo "<script>
        alert('Kategori berhasil ditambahkan!');
        window.location='index.php?menu=kategori';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f5f7fa;
    }
</style>

</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">📂 Tambah Kategori</h3>

    <a href="index.php?menu=kategori" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow">
        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>