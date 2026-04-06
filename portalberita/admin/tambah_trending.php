<?php
include 'koneksi.php';

$artikel = mysqli_query($conn, "SELECT * FROM artikel");

if(isset($_POST['simpan'])){
    $artikel_id = $_POST['artikel_id'];

    mysqli_query($conn, "INSERT INTO trending (artikel_id) VALUES ('$artikel_id')");

    echo "<script>
        alert('Berhasil ditambahkan!');
        window.location='index.php?menu=trending';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Trending</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

<h3>Tambah Trending</h3>

<a href="index.php?menu=trending" class="btn btn-secondary mb-3">← Kembali</a>

<form method="POST">

<div class="mb-3">
<label>Pilih Artikel</label>
<select name="artikel_id" class="form-control" required>
<option value="">-- Pilih Artikel --</option>
<?php while($a=mysqli_fetch_assoc($artikel)){ ?>
<option value="<?= $a['id'] ?>">
<?= $a['judul'] ?>
</option>
<?php } ?>
</select>
</div>

<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

</form>

</div>
</body>
</html>