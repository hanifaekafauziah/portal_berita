<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM kategori WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

// proses update
if(isset($_POST['update'])){

    $nama = $_POST['nama_kategori'];

    mysqli_query($conn, "
        UPDATE kategori 
        SET nama_kategori='$nama'
        WHERE id='$id'
    ");

    echo "<script>
        alert('Kategori berhasil diupdate!');
        window.location='index.php?menu=kategori';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h3>✏️ Edit Kategori</h3>

    <a href="index.php?menu=kategori" class="btn btn-secondary mb-3">← Kembali</a>

    <form method="POST">

        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                   value="<?= $row['nama_kategori'] ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-warning">
            Update
        </button>

    </form>

</div>

</body>
</html>