<?php
    require_once '../../config.php';
    if(is_numeric($_SESSION['organizationID']) && $_SESSION['type'] == "Foundation")
    {
        
    }else {
        header("location: FoundationLogin.php");
        exit();
    }
