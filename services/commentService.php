<?php
	
	require_once('../db/db.php');

	


	function createcmnt($comment){
		$con = dbConnection();

		
	
		$sql = "insert into comments values('','{$comment['text']}','{$comment['pid']}','{$comment['uid']}','{$comment['name']}' )";
		
		if(mysqli_query($con, $sql)){
			echo "registration done";
			return true;
		}else{
			return false;
		}
	}

	function getAllComments($pid){
		$con = dbConnection();
		$sql = "select * from comments where post_id='{$pid}'";
		$result = mysqli_query($con, $sql);
		$cmnt =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($cmnt, $row);
		};
		return $cmnt;
	}

	function getCommentById($id , $pid){
		$con = dbConnection();
		$sql = "select * from comments where post_id='{$pid}' and user_id='{$id}'";
		$result = mysqli_query($con, $sql);
		$cmnt =[];
		while($row = mysqli_fetch_assoc($result)){
			array_push($cmnt, $row);
		};
		return $cmnt;
	}
	
	function deleteCommentById($id){
		$con = dbConnection();
		$sql = "delete from comments where comment_id ='{$id}'";
		$result = mysqli_query($con, $sql);
		if(mysqli_query($con, $sql)){
			
			return true;
		}else{
			return false;
		}
		
	}
	
	



?>