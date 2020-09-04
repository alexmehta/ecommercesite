<?php
    include 'includes/db_credentials.php';
    $name = $_POST['name'];
    $id = $_GET['id'];
    $cost= $_POST['cost'];
    $description = $_POST['description'];
    $imgSrc = $_FILES['photo']['tmp_name'];
    list($width, $height) = getimagesize($imgSrc);
    $myImage = imagecreatefromjpeg($imgSrc);
    if($width > $height){
        $y = 0;
        $x = ($width - $height)/2;
        $smallestSide = $height;
    } else {
        $x = 0;
        $y = ($width - $height)/2;
        $smallestSide = $width;
    }
    $thumbSize = 300;
    $thumb = imagecreatetruecolor($thumbSize, $thumbSize);
    imagecopyresampled($thumb, $myImage, 0,0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);
    $filename = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
    imagejpeg($thumb, 'img/' . $filename . '.jpg');
    $filename = $filename . ".jpg";
    $sql = "UPDATE listings SET name='{$name}', cost='{$cost}', description='{$description}', image_path='{$filename}' WHERE id = '{$id}'";
    mysqli_query($conn, $sql);
    header("LOCATION: admin.php");