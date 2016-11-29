<?php
session_start();
$text = $_SESSION['secure'];


$font_size = 30;
$font_width = 190;
$font_height = 50;

$img = imagecreate($font_width, $font_height);
imagecolorallocate($img, 255, 255, 255);
$fcolor = imagecolorallocate($img, 35, 123, 111);

for($x=0; $x<30; $x++)
{
$x1= rand(0,100);
$y1= rand(0,100);
$x2= rand(0,100);
$y2= rand(0,100);
imageline($img, $x1, $y1, $x2, $y2, $fcolor);
}

imagettftext($img, $font_size, 0,15,40, $fcolor, 'font.TTF', $text);
header("Content-type: image/jpeg");	

//$watermark = imagecreatefrompng('logo.png');
//$w_h = imagesy($watermark);
//$w_w =imagesx($watermark);

//$img = imagecreatetruecolor($w_w, $w_h);
//$img = imagecreatefromjpeg($img);
//$img_size = getimagesize($img);
//$x = $img_size[0] - $w_w - 10;
//$y = $img_size[1] - $w_h - 10;

//imagecopymerge($img, $watermark, $x, $y,0,0, $w_w, $w_h,20);

imagejpeg($img);

?>
