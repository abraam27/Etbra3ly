<?php
    require_once '../../config.php';
    if(is_numeric($_SESSION['organizationID']) && $_SESSION['type'] == "Blood Bank")
    {
        
    }else {
        header("location: BloodBankLogin.php");
        exit();
    }
