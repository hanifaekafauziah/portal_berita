<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM trending WHERE id='$id'");

echo "<script>
    alert('Berhasil dihapus!');
    window.location='index.php?menu=trending';
</script>";
?>