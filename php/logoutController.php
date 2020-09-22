<?php

	session_start();
	session_destroy();
	//setcookie("name", $name, time()-3600, "/");

	header('location: ../views/login.php');

?>