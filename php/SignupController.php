<?php
	require_once('../services/userService.php');

	if(isset($_POST['submit'])){

		$fullname 	= $_POST['fullname'];
		$password 	= $_POST['password'];
        $email 		= $_POST['email'];
        $address    = $_POST['address'];
        $phoneno    = $_POST['phoneno'];
        $type       = $_POST['type'];
        $photo      = $_POST['photo'];

		if(empty($username) || empty($password) || empty($email)){
			
		}else{
			
			$user = [
                'fullname'	=>$fullname,
                'email'		=>$email,
                'address'   =>$address,
                'phoneno'   =>$phoneno,
                'password'	=>$password,
                'type'      =>$type,
                'photo'     =>$photo
				
			];

			$status = create($user);
		
			if($status){
				header('location: ../views/login.php?msg=success');
			}else{
				header('location: ../views/signup.php?error=dberror');
			}
		}
		
	}
?>