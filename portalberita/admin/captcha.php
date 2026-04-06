<?php
session_start();

$chars = 'abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
$captcha = substr(str_shuffle($chars), 0, 4);

$_SESSION['captcha'] = $captcha;

$image = imagecreate(100, 40);
$bg = imagecolorallocate($image, 240, 240, 240);
$textcolor = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 5, 25, 10, $captcha, $textcolor);

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
?>