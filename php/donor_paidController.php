<?php
    require_once('./sessionController.php');
    require_once('../services/paymentService.php');
	require_once('../services/postService.php');
	require_once('../services/userService.php');
	require_once('../db/db.php');

	//include('../db/db.php');
	//$_SESSION['post_id'] = $pid;
	//$email = $_SESSION['email'];
	
	$donation = $_GET['donation'];
	echo $_SESSION['email'];

	echo $_SESSION['user_id'];

	

    /*

    $raiserid = getraiserid( $_SESSION['post_id']);

	$raiser_id=$raiserid['user_id'];
	$getamount = $raiserid['getamount'];


	//$did = getByEmail();
	//$donor_id= $did['user_id'];

	//$donorname = getdonorname($donor_id);
	//$donor_name = $donorname['fullname'];

	//$raisername = getdonorname($raiser_id);
	//$raiser_name = $raisername['fullname'];


	//$totalamount = $getamount + $donation;




    


/*
		   
		   $payment = [
			
			'donorid'	=>$donor_id,
			'raiserid'	=>$raiser_id,
			'postid'	=>$_SESSION['post_id'],

			'donorname' =>$donor_name,
			'raisername' =>$raiser_name,
			'amount'   =>$donation
			
		];

		

*/
		
		
	
?>

<?php
   $dbconn = dbConnection();

 //$donation=$_SESSION["donation"];
  $query = "SELECT * FROM posts where post_id=".$_SESSION['post_id']." ";
  $result = mysqli_query($dbconn,$query);
  $res = mysqli_fetch_array($result); 
      $post_id=$res['post_id'];
      $post_user_id=$res['user_id'];
      $post_fullname=$res['user_name'];
     // $name = $res['user_name'];
      $date=$res['post_time'];
      $tamount=$res['post_amount'];
      $amountget= $res['getamount'];
	  $updateamount = $amountget + $_GET['donation'];
	  
	  echo $post_fullname;
	  echo $updateamount;
	 




     $query5 = "SELECT * FROM users where user_id=".$_SESSION['user_id']." ";
     $result1 = mysqli_query($dbconn,$query5);
     $res1 = mysqli_fetch_array($result1); 
     $d_user_id=$res1['user_id'];
     // $firstname=$res['firstname'];
	  $dname=$res1['fullname'];
	  
	  echo $dname;
     


     $query2 = "UPDATE posts
     SET getamount = '$updateamount'
     WHERE post_id=".$_SESSION['post_id']."";
     $result = mysqli_query($dbconn,$query2);





     date_default_timezone_set('Asia/Manila');
     $date = date("Y-m-d H:i:s");


    /* $query3 = "INSERT INTO donationlist( d_user_id, d_user_name, d_amount, p_user_id, p_user_name, date, post_id)
      VALUES ('$d_user_id','$d_user_name',".$_GET['donation'].",'$post_user_id','$post_username','$date','$post_id')";
     $result = mysqli_query($dbconn,$query3);

	 header('Location:success.php');
	 */


	 $payment=[
		 'donorid'=> $_SESSION['user_id'],
		 'raiserid'=>  $post_user_id,
		 'postid'  =>$_SESSION['post_id'],
		 'time'    =>  $date ,
		 'donorname'=> $dname,
		 'raisername' =>$post_fullname,
		 'amount'   => $donation

	 ];

	 $status = payment($payment);

	 if($status){
		header('location: ../views/donor_home.php');
	}else{
		echo "failed";
	}
  
?>