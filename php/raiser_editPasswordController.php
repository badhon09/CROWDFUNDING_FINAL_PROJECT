<?php
	session_start();
	require_once('../services/userService.php');
	require_once('../db/db.php');

	if(isset($_POST['update'])){

		$pa_ss= $_SESSION['user']['password'];
		$oldpass 	= $_POST['oldpass'];
	    $newpass 		= $_POST['newpass'];
        $conpass    = $_POST['conpass'];
        $id         = $_SESSION['user']['user_id'];

	    if($oldpass !== $pa_ss){
	    	$_SESSION['update_error_message'] = "Put your Current Password";
	    	header('location: ../views/raiser_change_password.php');
		}elseif ($newpass !== $conpass){
	    	$_SESSION['update_error_message'] = "Password has to match";
	    	header('location: ../views/raiser_change_password.php');
	    }else{
			$user = [
				'password'	=>$newpass,
	            'id'		=> $id
			];

			$status = raiserPasswordUpdate($user);
		
			if($status){
				$_SESSION['user']['password'] = $newpass ;
				header('location: ../views/raiser_profile.php');
			}else{
				$_SESSION['update_error_message'] = "DB error!!!";
				header('location: ../views/raiser_change_password.php');
			}

		}
	}
?>