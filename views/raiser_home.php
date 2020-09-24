<?php
  	session_start();
	require_once('../services/postService.php');
	$posts = getPostsById($_SESSION['user']['user_id']);
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
		<div class="row">
			<div class="column">
				<div class="search">
					<input type="text" class="default-field" name="search" placeholder="Search...">
					<button class="default-button"><a href="dash.php">Search</a></button>
				</div>
			</div>
			<div class="column">
				<div class="add-new-post">
					<button class="default-button"><a href="raiser_add_post.php">Add new Post</a></button>
				</div>
			</div>
		</div>
        <?php for($i=0; $i != count($posts); $i++ ){ ?>
      		<div class="home-post">
        		<img width="190px" src="../uploads/<?= $posts[$i]['post_pic'] ?>" alt="Avatar" >
          		<h4><b><?= $posts[$i]['post_title'] ?></b></h4>
          		<p><?= substr($posts[$i]['post_details'], 0, 100). "....." ?></p>
          		<button class="default-button-01"><a href="./raiser_postdetails.php?postid=<?= $posts[$i]['post_id'] ?>" >See in Details</a></button>     
      		</div>
        <?php } ?>
	</div>
</body>
</html>