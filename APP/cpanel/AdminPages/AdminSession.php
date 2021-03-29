<?php
    require_once '../../config.php';
    if($_SESSION["Admin"] == "Admin")
    {
        
    }else {
        header("location: AdminLogin.php");
        exit();
    }
