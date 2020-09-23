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
			<h1>Edit Your Profile</h1>
			<h3 class="error-message">
	            <?php if(!empty($_SESSION['update_error_message'])){
	                echo $_SESSION['update_error_message'] ;
	                unset($_SESSION['update_error_message']);
	                }
	            ?>
	        </h3>
			<form action="../php/raiser_editProfileController.php" method="post" >
			  	<div class="sc-container">
				    <input type="text" placeholder="Username" name="name" value="<?= $user['fullname'] ?>"/>
				    <input type="text" placeholder="Email Address" name="email" value="<?= $user['email'] ?>"/>
				    <input type="text" placeholder="Address" name="address" value="<?= $user['address'] ?>"/>
				    <input type="text" placeholder="Contact No." name="contact" value="<?= $user['contact'] ?>"/>
				    <button type="submit" name="update">Update Profile</button>
		  		</div>
			</form>
			<a class='link' href="raiser_change_password.php">Change Password</a>
			<a class='link' href="raiser_change_profile_picture.php">Change Profile Picture</a>
		</div>
	</div>
</body>
</html>