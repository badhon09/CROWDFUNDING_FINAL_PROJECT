<?php
	session_start();
	require_once('../services/postService.php');
	if (isset($_POST['addPost'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$amount = $_POST['amount'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/" . $_FILES["photo"]["name"]);         
		$photo=$_FILES["photo"]["name"];

		if (empty($title) || empty($description) || empty($amount) ) {
			$_SESSION['add_post_error_message'] = "Please, fill all the input fields";
			header('location:../views/raiser_postedit.php?postid='.$id);
		}else{
			$post = [
				'title'	=>$title,
				'description'		=>$description,
				'amount'	=>$amount,
				'photo'		=>$photo,
				'id'   =>$id,
			];
			$status = updatePostByRaiser($post);
			if ($status) {
				header('location:../views/raiser_postdetails.php?postid='.$id);
			}else{
				$_SESSION['add_post_error_message'] = "DB error!!";
				header('location:../views/raiser_postedit.php?postid='.$id);
			}
		}
	}

