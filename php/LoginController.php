<?php
	session_start();

	require_once('../services/userService.php');

	if(isset($_POST['submit'])){

		$email = $_POST['email'];
		$password = $_POST['password'];
		

	

			$user = [
				'email'=>$email,
				'password'=>$password
			];

			$status = validate($user);

			if($status){
				$_SESSION['email'] = $email;

				$u = getByEmail($email);
				$type = $u['type'];

				$_SESSION['type']=$type;
				




				//$_SESSION['user_id']=$id;
				//$type=$_SESSION['type'];
				//$id=$_SESSION['user_id'];

				if($type=="donor"){

				
				setcookie('type', "OK", time()+5, '/');
				header('location: ../views/donor_home.php');

			}
			elseif($type=="raiser"){
				header('location: ../views/raiser_home.php');
			}

			elseif($type=="admin"){
				header('location: ../views/admin_home.php');

			}
				
			}else{
				header('location: ../views/login.php?error=invalid');
			}
		
		
	}
?>