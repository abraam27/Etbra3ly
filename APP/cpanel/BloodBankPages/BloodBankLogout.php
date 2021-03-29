<?php
	session_start();
	if(isset($_SESSION['organizationID'],$_SESSION['type']))
	{
		unset($_SESSION['organizationID']);
                unset($_SESSION['type']);
                header("location: BloodBankLogin.php");
                exit();
	}else {
		header("location: BloodBankLogin.php");
                exit();
	}
?>