<?php
    if (isset($_SESSION['login'])){

    }else{
        header("LOCATION: index.php");
    }