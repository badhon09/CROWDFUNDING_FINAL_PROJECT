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
		  <img width="150px" src="../uploads/<?=$user['photo']?>">
		  <h1>Name: <?= $user['fullname'] ?></h1>
		  <p>Email: <?= $user['email'] ?></p>
		  <p>Address: <?= $user['address'] ?></p>
		  <p>Contact: <?= $user['contact'] ?></p>
		  <p><button><a href="raiser_profile_edit.php">Edit Profile</a></button></p>
		</div>
	</div>
</body>
</html>