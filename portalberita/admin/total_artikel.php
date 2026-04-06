<?php
include "koneksi.php";

$query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM artikel");
$data  = mysqli_fetch_assoc($query);

echo $data['total'];
?>