<?php
	session_start();
	require_once('../services/userService.php');
	$error = array("");
	if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = $_POST['password'];
		if(empty($email) == true || empty($password) == true){
			$_SESSION['login_error_msg'] = "Sorry, Fill up all the fields accurately";
			header('location: ../views/login.php?error=invalid');
		}else{
			$user = [
			'email'=>$email,
			'password'=>$password
			];

			$status = validate($user);

			if($status){
				$_SESSION['email'] = $email;
				$u = getByEmail($email);
				$_SESSION['user'] = $u;
				$type = $u['type'];

				$_SESSION['type']=$type;
				




				//$_SESSION['user_id']=$id;
				//$type=$_SESSION['type'];
				//$id=$_SESSION['user_id'];

				if($type=="donor"){

				
				setcookie('type', "OK", time()+3600, '/');
				header('location: ../views/donor_home.php');
				}elseif($type=="raiser"){
					header('location: ../views/raiser_home.php');
				}elseif($type=="admin"){
					header('location: ../views/admin_home.php');
				}	
			}else{
				$_SESSION['login_error_msg'] = "Sorry, that user name or password is incorrect. Please try again.";
				header('location: ../views/login.php?error=invalid');
			}

		}
	}
?>