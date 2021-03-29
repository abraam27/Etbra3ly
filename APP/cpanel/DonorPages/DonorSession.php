<?php
    require_once '../../config.php';
    if(is_numeric($_SESSION['donorID']))
    {
        
    }else {
        header("location: DonorLogin.php");
        exit();
    }
