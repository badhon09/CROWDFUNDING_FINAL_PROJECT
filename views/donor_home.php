<?php
	require_once('../php/sessionController.php');
  require_once('../services/postService.php');
  require_once('../services/userService.php');
 // require_once('../../db/db.php');
 $user = getByEmail($_SESSION['email']);
  $a    = $user['user_id'];
  $_SESSION['user_id']=$a;

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./assets/donor/css/style.css">
    
          
          
    <title>Dashboard</title>
    
    
    
    
      </head>
    <body>
      

    <section>
        <nav>
        <a href="#" class="logo">Crowd Funding</a>
        <ul>
            <li><a href="#" class="active">Home </a></li>
            <li><a href="./donor_profile.php">profile</a></li>
           <li><a href="#">Logout</a></li>
        </ul>
        </nav>
    </section>
    <h1>Welcome home <?=$_SESSION['type']?> </h1>
    <h1><?php echo $a ?></h1>
   
    <div class="postarea">
      <div class="title">
        <h1 align="center">Raisers Post</h1>
      </div>

  <?php
  $posts = getposts();

?>


      <center>
        <div class="postcards">
        <?php for($i=0; $i != count($posts); $i++ ){ ?>
      <div class="card">
        <img width="220px" src="./assets/pics/xxx.jpg" alt="Avatar" >
      
          <h4><b><?= $posts[$i]['post_title'] ?></b></h4>
          <p><?= $posts[$i]['user_name'] ?></p>
          <a href="./donor_postdetails.php?postid=<?= $posts[$i]['post_id'] ?>" class="myButton">Details</a>
       
      </div>

        <?php } ?>

      <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container">
          <h4><b>John Doe</b></h4>
          <p>Architect & Engineer</p>
        </div>
      </div>

      <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container">
          <h4><b>John Doe</b></h4>
          <p>Architect & Engineer</p>
        </div>
      </div>

      <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container">
          <h4><b>John Doe</b></h4>
          <p>Architect & Engineer</p>
        </div>
      </div>

      <div class="card">
        <img src="img_avatar.png" alt="Avatar" style="width:100%">
        <div class="container">
          <h4><b>John Doe</b></h4>
          <p>Architect & Engineer</p>
        </div>
      </div>
  



    </div>
  </center>
 


    </div>
    
 </body>
</html>