<?php

$destImg = imagecreatefrompng('https://test.odinholod.by/template/images/1.png');
$srcImg = imagecreatefrompng('https://test.odinholod.by/template/images/2.png');
imagecopymerge($destImg, $srcImg, 10, 10, 0, 0, 350, 120, 60);
header('Content-Type: image/png');
imagepng($destImg);
imagedestroy($destImg);
imagedestroy($srcImg);

