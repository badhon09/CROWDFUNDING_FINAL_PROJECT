<?php
	require_once('../services/userService.php');
	require_once('../db/db.php');
	//include('../db/db.php');

	if(isset($_POST['submit'])){

		$fullname 	= $_POST['fullname'];
	    $email 		= $_POST['email'];
        $address    = $_POST['address'];
		$phoneno    = $_POST['phoneno'];
        $password 	= $_POST['password'];
		$type       = $_POST['type'];
		
		move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/" . $_FILES["photo"]["name"]);         
		   $photo=$_FILES["photo"]["name"];
		   
		   $user = [
			'fullname'	=>$fullname,
			'email'		=>$email,
			'address'	=>$address,
			'phoneno'   =>$phoneno,
			'photo'		=>$photo,
			'password'	=>$password,
			'type'		=>$type
		];

		$status = create($user);
	
		if($status){
			header('location: ../views/login.php');
		}else{
			header('location: ../views/registration.php');
		}

			
		
		
	}
?>