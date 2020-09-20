<?php
	
	require_once('../db/db.php');


	function create($comment){
		$con = dbConnection();

		
	
		$sql = "insert into comments values('','{$comment['text']}','{$comment['pid']}','{$comment['uid']}','{$comment['name']}' )";
		
		if(mysqli_query($con, $sql)){
			echo "registration done";
			return true;
		}else{
			return false;
		}
	}

	
	



?>