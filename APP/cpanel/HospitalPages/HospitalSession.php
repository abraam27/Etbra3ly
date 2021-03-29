<?php
    require_once '../../config.php';
    if(is_numeric($_SESSION['organizationID']) && $_SESSION['type'] == "Hospital")
    {
        
    }else {
        header("location: HospitalLogin.php");
        exit();
    }
