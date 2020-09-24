<?php
  	session_start();
	require_once('../services/postService.php');
	$posts = getpostByid($_GET['postid']);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./assets/donor/css/style.css">
	<title>Edit post</title>
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
		<div class="row">
			<form action="../php/raiser_editPostController.php" method="post" class="add-form" enctype="multipart/form-data">
				<label>Title</label>
				<input type="text" name="title" value="<?=$posts['post_title']?>">
				<label>Description</label>
				<textarea name="description" cols="30" rows="10"><?php echo $posts['post_details']?></textarea>
				<label>Documents</label>
				<img width="200px" src="../uploads/<?=$posts['post_pic']?>"/>
				<input type='file' name="photo">
				<label>Amount</label>
				<input type="text" name="amount" value="<?=$posts['post_amount']?>">
				<input type="hidden" name="id" value="<?=$posts['post_id']?>">
				<input type="submit" value="Add Post" name="addPost">
			</form>
		</div>
	</div>
</body>
</html>