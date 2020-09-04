<?php
    $servername = "localhost";//localhost:8888 for mac
    $username = "root";
    $password = "";//root for mac users
    $database_name = "ecommerce";

    //create connection
    $conn = mysqli_connect($servername, $username, $password, $database_name);