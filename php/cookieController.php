<?php

if(isset($_COOKIE['type'])){
    if($_COOKIE['type'] == "OK"){


    }else{
		header('location: login.php');
		}
	}else{
		header('location: login.php?msg=statusnotfound');
	}


?>