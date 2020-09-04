<?php
session_start();
$user_id=$_SESSION['id_user'];

include 'includes/db_credentials.php';
    $sql = "DELETE FROM cart WHERE login_id = '{$user_id}'";
    mysqli_query($conn, $sql);
    if ($conn ->query($sql) !== TRUE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
    header("LOCATION: listing.php");
    ?>
