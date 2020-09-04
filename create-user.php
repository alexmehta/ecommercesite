<?php

    include 'includes/db_credentials.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password)
            values('{$username}', '{$password}')";

    if ($conn ->query($sql) !== TRUE){
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header("LOCATION: index.php");
