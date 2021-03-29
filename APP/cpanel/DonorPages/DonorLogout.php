<?php
	session_start();
	if(isset($_SESSION['donorID']))
	{
		unset($_SESSION['donorID']);
                header("location: DonorLogin.php");
                exit();
	}else {
		header("location: DonorLogin.php");
                exit();
	}
?>