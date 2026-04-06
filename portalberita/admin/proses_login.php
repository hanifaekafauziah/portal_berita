<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$captcha  = $_POST['captcha'];

// cek captcha
if($captcha != $_SESSION['captcha']){
    echo "Captcha salah!";
    exit;
}

// cek user
$query = mysqli_query($conn,"SELECT * FROM ADMIN WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    // ✅ WAJIB ADA
    $_SESSION['login'] = true;

    // ✅ DATA USER
    $_SESSION['username'] = $data['username'];
    $_SESSION['password']     = $data['password'];

    // ✅ REDIRECT AMAN
    header("Location: index.php");
    exit;

}else{
    echo "Username atau password salah!";
}
?>