<?php
session_start();
if($_SESSION['admin']==1){

}else{
    header("LOCATION: index.php");
}
    include 'includes/db_credentials.php';
    print_r($_FILES);
$name = $_POST['name'];
    $cost= $_POST['cost'];
    $description = $_POST['description'];
    $imgSrc = $_FILES['photo']['tmp_name'];
    $extension = $_FILES['photo']['type'];
    echo $extension;
    list($width, $height) = getimagesize($imgSrc);
    if ($extension=="image/jpeg"){
        $myImage = imagecreatefromjpeg($imgSrc);

    }elseif ($extension=="image/png"){
        $myImage = imagecreatefrompng($imgSrc);
    }elseif ($extension=="image/gif"){
        $myImage = imagecreatefromgif($imgSrc);

    }
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
    $sql = "INSERT INTO listings (name, description, image_path, cost) VALUES ('{$name}','{$description}','{$filename}','{$cost}')";
    mysqli_query($conn,$sql);
    $conn->close();

    header("LOCATION: admin.php");