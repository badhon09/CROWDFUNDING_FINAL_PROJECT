<?php
	session_start();
	require_once('../services/postService.php');
	if (isset($_POST['addPost'])) {
		$title = $_POST['title'];
		$description = $_POST['description'];
		$amount = $_POST['amount'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/" . $_FILES["photo"]["name"]);         
		$photo=$_FILES["photo"]["name"];

		if (empty($title) || empty($description) || empty($amount) ) {
			$_SESSION['add_post_error_message'] = "Please, fill all the input fields";
			header('location:../views/raiser_add_post.php');
		}else{
			$id = $_SESSION['user']['user_id'];
			$name = $_SESSION['user']['fullname'];
			$date = date("h:i:sa");
			$post = [
				'title'	=>$title,
				'description'		=>$description,
				'amount'	=>$amount,
				'photo'		=>$photo,
				'id'   =>$id,
				'name'		=>$name,
				'time'	=>$date,
				'getamount'		=>0
			];
			$status = addPostByRaiser($post);
			if ($status) {
				$_SESSION['add_post_sucess_message'] = "New Post added successfully";
			}else{
				$_SESSION['add_post_error_message'] = "DB error!!";
			}
			header('location:../views/raiser_add_post.php');
		}
	}

