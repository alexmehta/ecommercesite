<?php
    session_start();
include "includes/db_credentials.php";
    if($_SESSION['admin']==1){

    }else{
        header("LOCATION: index.php");
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM listings WHERE id='{$id}'";
        $sql2 = "DELETE FROM cart WHERE item='{$id}' ";
        mysqli_query($conn, $sql);
        mysqli_query($conn, $sql2);
        $conn -> close();
    }

    header("LOCATION:admin.php");