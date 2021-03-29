<?php
	session_start();
	if(isset($_SESSION['organizationID'],$_SESSION['type']))
	{
		unset($_SESSION['organizationID']);
                unset($_SESSION['type']);
                header("location: HospitalLogin.php");
                exit();
	}else {
		header("location: HospitalLogin.php");
                exit();
	}
?>