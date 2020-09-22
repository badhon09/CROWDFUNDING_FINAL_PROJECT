<?php
/*
  	session_start();
	echo "username: ". $_SESSION['user']['fullname'];
	echo "</br>";
	echo "password: ". $_SESSION['user']['password'];
*/
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
		<div class="row">
			<table>
				<tr>
					<td></td>
					<td>
						<h3>Lorem ipsum dolor sit amet</h3>
						<p>consectetur adipiscing elit. Morbi tincidunt metus et quam molestie varius. Nulla id malesuada mauris, sit amet facilisis augue. Nullam sodales risus a nisl volutpat, id sagittis tellus maximus. Cras id ligula pellentesque, suscipit tortor eu, dictum quam. Integer vitae purus aliquet, tempor eros ut, cursus ipsum. . .<a href="View Posts.php">View Post</a> </p>
						<h3>Morbi euismod orci non tincidunt elementum</h3>
						<p>Sed pretium pellentesque dolor, non efficitur nisl congue nec. Etiam imperdiet quis justo ut pellentesque. Sed mattis ultricies orci vel condimentum. Nulla vulputate ipsum eu justo sodales ornare. Ut blandit sagittis ligula a mollis. Morbi suscipit sem nisl, quis tincidunt odio vehicula eu. Sed eget sapien ex. . . .<a href="View Posts.php">View Post</a> </p>
						<h3>Lorem ipsum dolor sit amet</h3>
						<p>consectetur adipiscing elit. Morbi tincidunt metus et quam molestie varius. Nulla id malesuada mauris, sit amet facilisis augue. Nullam sodales risus a nisl volutpat, id sagittis tellus maximus. Cras id ligula pellentesque, suscipit tortor eu, dictum quam. Integer vitae purus aliquet, tempor eros ut, cursus ipsum. . .<a href="View Posts.php">View Post</a> </p>
						<h3>Mauris at venenatis velit. Quisque id purus</h3>
						<p>Suspendisse eget congue ante, pretium finibus nulla. Mauris posuere pellentesque condimentum. Fusce sit amet odio mattis, mollis elit eget, iaculis tellus. Aliquam nec nulla semper tortor blandit gravida. Nulla posuere neque vitae orci ullamcorper molestie vel nec mi. Morbi id eros dapibus, vestibulum eros at, maximus justo. . . .<a href="View Posts.php">View Post</a> </p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>