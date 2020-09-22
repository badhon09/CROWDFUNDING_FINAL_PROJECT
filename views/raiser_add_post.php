<?php
  	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./assets/donor/css/style.css">
	<title>Add new post</title>
</head>
<body>
	<?php include('_raiser_navbar.php'); ?>
	<div class="add-post">
		<h3 class="error-message">
		    <?php if(!empty($_SESSION['add_post_error_message'])){
			        echo $_SESSION['add_post_error_message'] ;
			        unset($_SESSION['add_post_error_message']);
		        }
		    ?>
	  	</h3>
	  	<h3 class="success-message">
	  		<?php if(!empty($_SESSION['add_post_sucess_message'])){
			        echo $_SESSION['add_post_sucess_message'] ;
			        unset($_SESSION['add_post_sucess_message']);
		        }
		    ?>
	  	</h3>
		<div class="row">
			<form action="../php/raiser_addPostController.php" method="post" class="add-form" enctype="multipart/form-data">
				<label>Title</label>
				<input type="text" name="title">
				<label>Description</label>
				<textarea name="description" cols="30" rows="10"></textarea>
				<label>Documents</label>
				<input type='file' name="photo">
				<label>Amount</label>
				<input type="text" name="amount">
				<input type="submit" value="Add Post" name="addPost">
			</form>
		</div>
	</div>
</body>
</html>