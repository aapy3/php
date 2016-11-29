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



const CORNER_TOP_LEFT       = 1;
const CORNER_TOP_RIGHT      = 2;
const CORNER_BOTTOM_LEFT    = 3;
const CORNER_BOTTOM_RIGHT   = 4;

$backgroundImagePath = "logo.png";
$corner=CORNER_TOP_LEFT;
$alpha=60;
header('Content-type: image/jpeg');
$img_res=imagecreatefromjpeg("captcha.jpg");
$img_info=getimagesize($backgroundImagePath);

switch ($corner){
    case CORNER_TOP_LEFT:
        if(!imagecopymerge ($img_res, $img_res, 0, 0, 0, 0, $img_info[0], $img_info[1], $alpha)){
            throw new RuntimeException("Unable to make stamp!");
        }
        break;
    case CORNER_TOP_RIGHT:
        if(!imagecopymerge ($this->imageRes, $img_res, $this->info[0]-$img_info[0], 0, 0, 0, $img_info[0], $img_info[1], $alpha)){
            throw new RuntimeException("Unable to make stamp!");
        }
        break;
    case CORNER_BOTTOM_LEFT:
        if(!imagecopymerge ($this->imageRes, $img_res, 0, $this->info[1]-$img_info[1], 0, 0, $img_info[0], $img_info[1], $alpha)){
            throw new RuntimeException("Unable to make stamp!");
        }
        break;
    case CORNER_BOTTOM_RIGHT:
        if(!imagecopymerge ($this->imageRes, $img_res, $this->info[0]-$img_info[0], $this->info[1]-$img_info[1], 0, 0, $img_info[0], $img_info[1], $alpha)){
            throw new RuntimeException("Unable to make stamp!");
        }
        break;
}

imagejpeg($img_res);

?>







