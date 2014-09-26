<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/09/2014
 * Time: 09:50 AM
 */

if ($_FILES["newFileName"]["error"] > 0)
{
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else
{
    echo "Upload: " . $_FILES["newFileName"]["name"] . "<br>";
    echo "Type: " . $_FILES["newFileName"]["type"] . "<br>";
    echo "Size: " . ($_FILES["newFileName"]["size"] / 1024) . " kB<br>";
    echo "Stored in: " . $_FILES["newFileName"]["tmp_name"];
}

echo '<hr>';

$filename =  $_FILES["newFileName"]["name"];



$link = 'images/'.$filename;

echo '<a href="'.$link.'">'.$link.'</a>';

?>