<?php
	session_start();
	if(isset($_SESSION['Admin']))
	{
		unset($_SESSION['Admin']);
                header("location: AdminLogin.php");
                exit();
	}else {
		header("location: AdminLogin.php");
                exit();
	}
?>