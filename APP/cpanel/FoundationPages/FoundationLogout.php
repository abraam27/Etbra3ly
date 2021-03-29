<?php
	session_start();
	if(isset($_SESSION['organizationID'],$_SESSION['type']))
	{
		unset($_SESSION['organizationID']);
                unset($_SESSION['type']);
                header("location: FoundationLogin.php");
                exit();
	}else {
		header("location: FoundationLogin.php");
                exit();
	}
?>