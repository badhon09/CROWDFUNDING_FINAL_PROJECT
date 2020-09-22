<?php
	require_once('../services/commentService.php');
	require_once('../db/db.php');
	//include('../db/db.php');
	$cid=$_GET['cid'];
	
	//$pid = $_SESSION['post_id'];
	


	


	$stat = deleteCommentById($_GET['cid']);
	if($stat){
			echo "comment deleted please go back";
	} 

	if(isset($_POST['submit'])){

		$name 	= $_POST['name'];
	    $pid 		= $_POST['pid'];
        $uid    = $_POST['uid'];
		$text    = $_POST['comment'];

		$x = intval($pid);

		//echo intval($pid);
		
       
		   
		   $comment = [
			'text'	=>$text,
			'pid'		=>$pid,
			'uid'	=>$uid,
			'name'   =>$name
			
		];

		$status = createcmnt($comment);
		//echo $status;
	
		if($status){


			
			header('location: ../views/donor_postdetails.php?postid='+$status);
		}else{
			header('location: ../views/donor_postdetails.php');
		}

			
		
		
	}
?>