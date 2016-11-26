<?php
//Used to generate image for the random number generated

session_start ();

$randomnr = $_SESSION['randomnr2'];//get random number generated in signup page which is stored in session

$im = imagecreatetruecolor ( 120, 80 );

$white = imagecolorallocate ( $im, 255, 255, 255 );
$grey = imagecolorallocate ( $im, 128, 128, 128 );
$black = imagecolorallocate ( $im, 0, 0, 0 );

imagefilledrectangle ( $im, 0, 0, 200, 35, $black );
$font = 'font.ttf';
//imagettftext ( $im, 35, 0, 22, 50, $grey, $font, $randomnr );
imagettftext ( $im, 35, 0, 15, 52, $white, $font, $randomnr );

//$noiceLines = 25;
//for($i = 0; $i < $noiceLines; $i ++) {
//	imageline ( $im, mt_rand ( 0, 120 ), mt_rand ( 0, 80 ), mt_rand ( 0, 120 ), mt_rand ( 0, 80 ), 162453 );
//}

header ( "Content-type: image/gif" );
imagegif ( $im );
imagedestroy ( $im );
?>