<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM trending WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

$artikel = mysqli_query($conn, "SELECT * FROM artikel");

if(isset($_POST['update'])){
    $artikel_id = $_POST['artikel_id'];

    mysqli_query($conn, "UPDATE trending SET artikel_id='$artikel_id' WHERE id='$id'");

    echo "<script>
        alert('Berhasil diupdate!');
        window.location='index.php?menu=trending';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Trending</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

<h3>Edit Trending</h3>

<a href="index.php?menu=trending" class="btn btn-secondary mb-3">← Kembali</a>

<form method="POST">

<div class="mb-3">
<label>Pilih Artikel</label>
<select name="artikel_id" class="form-control" required>
<?php while($a=mysqli_fetch_assoc($artikel)){ ?>
<option value="<?= $a['id'] ?>"
<?= ($a['id']==$row['artikel_id'])?'selected':'' ?>>
<?= $a['judul'] ?>
</option>
<?php } ?>
</select>
</div>

<button type="submit" name="update" class="btn btn-success">Update</button>

</form>

</div>
</body>
</html>-