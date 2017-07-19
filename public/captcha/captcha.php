<?php
session_start();
date_default_timezone_set('America/Los_Angeles');
$captcha = imagecreatefromgif('cross.gif');

//set some variables
$black = imagecolorallocate($captcha, 0, 0, 0);
$white = imagecolorallocate($captcha, 225, 225, 225);
$red = imagecolorallocate($captcha, 225, 0, 0);
$font = 'arial.ttf';

//random stuff
$string = md5(microtime() * mktime());
$text = substr($string, 0, 5);
$_SESSION['code'] = $text;

//create some stupid stuff

imagettftext($captcha, 14, 5, 5, 20, $red, $font, $text);

// begin to create image
header('content-type: image/png');
imagepng($captcha);

//clean up
imagedestroy($captcha);

?>