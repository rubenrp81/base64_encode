<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/09/2014
 * Time: 10:59 AM
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Img Viewer</title>
    <style type="text/css">
        body { background-color: #f1f1f1}
        .photo { display: inline-block; width: 120px; background-color: #f1f1f1;
            padding:5px; margin: 10px; text-align: center;}
        .frame { border:1px solid #dddddd; margin: 5px;
            background-color: #ffffff;}
        .photo .frame img { border:1px solid #dddddd; margin: 5px; max-height: 100px; max-width: 100px;
            background-color: #ffffff; }
    </style>
</head>

<body>
<?php

function base64_encode_image ($filename, $filetype)
{
    $imgbinary = fread(fopen($filename, "r"), filesize($filename));
    return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
}


$directorio = "images/";
$lista = scandir($directorio, 1);

$isFirst = true;


echo '<h4>Imagenes:</h4>'."\r\n";

foreach($lista as $fileName)
{
    if(($fileName == '.') || ($fileName == '..'))
        continue;

    $archivoAProcesar = $directorio.$fileName;
    $lastpoint =  strrpos ( $fileName , '.');
    $ext = strtolower(substr($fileName,$lastpoint+1));

    echo '<a href="'.$archivoAProcesar.'" target="_blank">';
    echo '<div class="photo">';
    echo '<div class="frame">';
    echo '<img src="'.base64_encode_image ($archivoAProcesar,$ext).'"/>';
    echo '<br>'.$fileName;
    echo '</div>';
    echo '</div>';
    echo'</a>';
    echo "\r\n";

}
echo ''."\r\n";

/*
<style type="text/css">
.logo {
    background: url("<?php echo base64_encode_image ('img/logo.png','png'); ?>") no-repeat right 5px;
}
</style>
 */