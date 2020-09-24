<?php
  	session_start();
	require_once('../services/userService.php');
	$user =getByEmail($_SESSION['user']['email']);

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$target = '../uploads/'.basename($_FILES['pic']['name']);
		$image = $_FILES['pic']['name'];
		$id         = $_SESSION['user']['user_id'];
		$user = [
			'id'		=>$id,
			'photo'		=>$image,
		];
		raiserPicUpdate($user);
		if(move_uploaded_file($_FILES['pic']['tmp_name'], $target)){
			header('location: ../views/raiser_profile.php');
		}else{
			$_SESSION['update_error_message'] = "Somethiong went wrong";
		}
	}
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
			<h1>Change Profile Picture</h1>
			<h3 class="error-message">
	            <?php if(!empty($_SESSION['update_error_message'])){
	                echo $_SESSION['update_error_message'] ;
	                unset($_SESSION['update_error_message']);
	                }
	            ?>
	        </h3>
	        <h5>Current Picture: </h5>
	        <img width="150px" src="../uploads/<?=$user['photo']?>">
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
			  	<div class="sc-container">
			  		<input type="file" name="pic">
				    <button type="submit" name="update">Change</button>
		  		</div>
			</form>
			<a class='link' href="raiser_profile_edit.php">Back</a>
		</div>
	</div>
</body>
</html>