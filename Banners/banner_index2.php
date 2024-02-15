<?php
include_once 'Data/getData.php';
//
    $im = imagecreate(1500, 320);
    $bg = imagecolorallocate($im, 255, 0, 255);
    $colorText = imagecolorallocate($im, 0, 0, 255);
    imagestring($im, 5, 700, 20,'banner_index1', $colorText);
    $i=1;
    foreach ($_SESSION['data'] as $key=>$item) {
    imagestring($im, 5, 20, $i*50, $key.' : '. $item, $colorText);
    $i++;
    }

    header('Content-type: image/png');
    imagepng($im);
    imagedestroy($im);
