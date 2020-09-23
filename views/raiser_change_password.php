<?php
  	session_start();
	require_once('../services/userService.php');
	$user =getByEmail($_SESSION['user']['email']);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./assets/donor/css/style.css">
	<title>Dashboard</title>
</head>
<body>
	<?php include('_raiser_navbar.php'); ?>
	<div class="homepage">
		<div class="card-profile">
			<h1>Change Your Password</h1>
			<h3 class="error-message">
	            <?php if(!empty($_SESSION['update_error_message'])){
	                echo $_SESSION['update_error_message'] ;
	                unset($_SESSION['update_error_message']);
	                }
	            ?>
	        </h3>
			<form action="../php/raiser_editPasswordController.php" method="post" >
			  	<div class="sc-container">
			  		<input type="password" placeholder="Old Password" name="oldpass"/>
				    <input type="password" placeholder="Password" name="newpass"/>
				    <input type="password" placeholder="Confirm Password" name="conpass"/>
				    <button type="submit" name="update">Update Password</button>
		  		</div>
			</form>
			<a class='link' href="raiser_profile_edit.php">Back</a>
		</div>
	</div>
</body>
</html>