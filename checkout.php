<?php
    session_start();
    $user_id=$_SESSION['id_user'];

    include 'includes/db_credentials.php';
    $store_id = $_GET['id'];
    echo $store_id;
    $sql = "INSERT INTO cart (item, login_id) VALUES ('{$store_id}','{$user_id}')";
    mysqli_query($conn,$sql);
    header("LOCATION:cart.php");
    $conn->close();
?>

