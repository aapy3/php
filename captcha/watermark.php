<?php
session_start();
function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		@$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

$_SESSION['secure']= rand_string(5);

header('Content-type: image/jpeg');
if(isset($_GET['s']))
{
$source = $_GET['s'];

$watermark = imagecreatefrompng('logo.png');
$w_h = imagesy($watermark);
$w_w =imagesx($watermark);

$img = imagecreatetruecolor($w_w, $w_h);
$img = imagecreatefromjpeg($source);

$img_size = getimagesize($source);
$x = $img_size[0] - $w_w - 10;
$y = $img_size[1] - $w_h - 10;

imagecopymerge($img, $watermark, $x, $y,0,0, $w_w, $w_h,20);
imagejpeg($img);
}
?>







