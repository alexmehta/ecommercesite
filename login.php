<?php
    session_start();

    include 'includes/db_credentials.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='{$username}' LIMIT 1";
    $check = mysqli_query($conn, $sql);
    $check_user_match = mysqli_fetch_assoc($check);
    $conn -> close();
    if ($password == $check_user_match['password']){
        $_SESSION['id_user'] = $check_user_match['id'];
        $_SESSION['admin'] = 0;
        $_SESSION['login'] = 1;
        header("LOCATION: listing.php");
        if($check_user_match['is_admin']==1){
            $_SESSION['admin'] = 1;
            header("LOCATION: admin.php");
        }

    } else{
        $_SESSION['admin'] = 0;
        header("LOCATION: index.php");
    }
