<?php
	session_start();
	require_once('../services/userService.php');
	require_once('../db/db.php');

	if(isset($_POST['update'])){

		$fullname 	= $_POST['name'];
	    $email 		= $_POST['email'];
        $address    = $_POST['address'];
        $phoneno    = $_POST['contact'];
        $id         = $_SESSION['user']['user_id'];

        $name_array = str_split($fullname);
        $characters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',' ','.','-');
		foreach($name_array as $value) {
	        if(!in_array($value, $characters)){
	        	$_SESSION['update_error_message'] = $value."is not accepted character in name";
	        	header('location: ../views/raiser_profile_edit.php');
	        }
	    }
	    if(strlen($fullname) < 2){
	    	$_SESSION['update_error_message'] = "Name has to be at least 2 characters";
	    	header('location: ../views/raiser_profile_edit.php');
		}elseif ($name_array[0] == '.' || $name_array[0] == ' ' || $name_array[0] == '-'){
	    	$_SESSION['update_error_message'] = "Name has to start with a letter";
	    	header('location: ../views/raiser_profile_edit.php');
	    }elseif  (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    	$_SESSION['update_error_message'] = "Invalid Email Address";
	    	header('location: ../views/raiser_profile_edit.php');
		}elseif (strlen($address) < 5){
	    	$_SESSION['update_error_message'] = "Address length has to be more than 5 characters";
	    	header('location: ../views/raiser_profile_edit.php');
		}else{
			$user = [
				'fullname'	=>$fullname,
				'email'		=>$email,
				'address'	=>$address,
				'phoneno'   =>$phoneno,
	            'id'		=> $id
			];

			$status = raiserUpdate($user);
		
			if($status){
				$u = getByEmail($email);
				$_SESSION['user'] = $u;
				header('location: ../views/raiser_profile.php');
			}else{
				$_SESSION['update_error_message'] = "DB error!!!";
				header('location: ../views/raiser_profile_edit.php');
			}

		}
	}
?>