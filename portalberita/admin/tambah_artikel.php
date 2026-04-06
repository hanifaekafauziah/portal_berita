<?php
include 'koneksi.php';

// ambil data kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if(isset($_POST['simpan'])){
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori_id = $_POST['kategori_id'];

    // upload gambar
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file  = $_FILES['gambar']['tmp_name'];

    $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png'];

    if(!in_array($ext, $allowed)){
        echo "<script>alert('Format gambar harus JPG/JPEG/PNG');</script>";
    } else {

        $gambar_baru = time().'_'.$nama_file;
        move_uploaded_file($tmp_file, 'gambar/'.$gambar_baru);

        mysqli_query($conn, "INSERT INTO artikel 
        (judul, isi, gambar, kategori_id, tanggal) 
        VALUES 
        ('$judul','$isi','$gambar_baru','$kategori_id',NOW())");

        echo "<script>
            alert('Artikel berhasil ditambahkan!');
            window.location='index.php?menu=artikel';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Artikel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f5f7fa;
    }
</style>

</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">📝 Tambah Artikel</h3>

    <a href="index.php?menu=artikel" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label>Judul Artikel</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                            <option value="<?= $k['id'] ?>">
                                <?= $k['nama_kategori'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Isi Artikel</label>
                    <textarea name="isi" rows="5" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Upload Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-primary">
                    Simpan Artikel
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>