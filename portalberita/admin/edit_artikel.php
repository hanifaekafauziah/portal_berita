<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data artikel
$data = mysqli_query($conn, "SELECT * FROM artikel WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

// ambil kategori
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

// proses update
if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori_id = $_POST['kategori_id'];

    // cek apakah upload gambar baru
    if($_FILES['gambar']['name'] != ''){
        $nama_file = $_FILES['gambar']['name'];
        $tmp_file  = $_FILES['gambar']['tmp_name'];

        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png'];

        if(!in_array($ext, $allowed)){
            echo "<script>alert('Format gambar harus JPG/JPEG/PNG');</script>";
        } else {
            $gambar_baru = time().'_'.$nama_file;
            move_uploaded_file($tmp_file, 'gambar/'.$gambar_baru);

            mysqli_query($conn, "UPDATE artikel SET 
                judul='$judul',
                isi='$isi',
                kategori_id='$kategori_id',
                gambar='$gambar_baru'
                WHERE id='$id'
            ");
        }

    } else {
        // tanpa ganti gambar
        mysqli_query($conn, "UPDATE artikel SET 
            judul='$judul',
            isi='$isi',
            kategori_id='$kategori_id'
            WHERE id='$id'
        ");
    }

    echo "<script>
        alert('Artikel berhasil diupdate!');
        window.location='index.php?menu=artikel';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Artikel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f5f7fa;
    }
    img {
        border-radius: 10px;
    }
</style>

</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">✏️ Edit Artikel</h3>

    <a href="index.php?menu=artikel" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow">
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label>Judul Artikel</label>
                    <input type="text" name="judul" class="form-control" 
                        value="<?= $row['judul'] ?>" required>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>

                        <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                            <option value="<?= $k['id'] ?>"
                                <?= ($k['id'] == $row['kategori_id']) ? 'selected' : '' ?>>
                                <?= $k['nama_kategori'] ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Isi Artikel</label>
                    <textarea name="isi" rows="5" class="form-control" required><?= $row['isi'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label>Gambar Saat Ini</label><br>
                    <img src="assets/images/<?= $row['gambar'] ?>" width="120">
                </div>

                <div class="mb-3">
                    <label>Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button type="submit" name="update" class="btn btn-success">
                    Update Artikel
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>