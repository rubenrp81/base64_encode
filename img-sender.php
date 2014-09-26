<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/09/2014
 * Time: 09:54 AM
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Img SENDER</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="imgSender">
    FILE: <input name="newFileName" type="file" />
    <input name="btnSend" type="submit" value="SEND" />
</form>
<?php

if (isset($_FILES["newFileName"]))
{

    if($_FILES["newFileName"]["error"] > 0)
    {
        echo "Error: " . $_FILES["newFileName"]["error"] . "<br>";
    }
    else
    {
        if(file_exists("images/" . $_FILES["newFileName"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["newFileName"]["tmp_name"], "images/" . $_FILES["newFileName"]["name"]);
            echo "Stored in: " . "images/" . $_FILES["newFileName"]["name"];
        }

        echo "Upload: " . $_FILES["newFileName"]["name"] . "<br>";
        echo "Type: " . $_FILES["newFileName"]["type"] . "<br>";
        echo "Size: " . ($_FILES["newFileName"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["newFileName"]["tmp_name"];

        echo '<hr>';
        $filename = $_FILES["newFileName"]["name"];
        $link = 'images/' . $filename;
        echo '<a href="' . $link . '">' . $link . '</a>';
    }
}
?>
</body>
</html>
