<?php
	session_start();
	require_once('../php/sessionController.php');	
	require_once('../services/userService.php');	

  $email=$_SESSION['email'];


  $user = getByEmail($email);


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
            <li><a href="#">profile</a></li>
           <li><a href="#">Logout</a></li>
        </ul>
        </nav>
    </section>
<h1><?php echo $_SESSION['user_id'] ?></h1>
        <h1 align="center">My Profile</h1>

<center>
    <section class="profile">
    <img width="220px"src="../uploads/<?=$user['photo']?>">
      <table class="prof_table">
        <tbody>
          <tr>
            <td>Name:</td>
            <td width="1em"></td>
            <td><?=$user['fullname']?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td width="1em"</td>
            <td><?=$user['email']?></td>
          </tr>
         
          <tr>
            <td>Adress:</td>
            <td width="1em"</td>
            <td><?=$user['address']?></td>
          </tr>
          <tr>
            <td>Contact No:</td>
            <td width="1em"</td>
            <td><?=$user['contact']?></td>
          </tr>
          
        </tbody>
      </table>
    </section><br>
    <a class="myButton" href="./donor_editprofile.php">edit</a>
  </center>




  <h1 align="center">My Donation History</h1>

  <center>
      <section>
        <table border="1" width="600px"class="prof_table">
          <tbody>
            <tr>
              <td>Donated To </td>
              <td>Donated Amount</td>
              <td>Post ID</td>
              <td>Donation Date</td>
            </tr>
            <tr>
              <td>Donated To </td>
            <td>Donated Amount</td>
            <td>Post ID</td>
            <td>Donation Date</td>
            </tr>
            
          </tbody>
        </table>
      </section>
      <br><br>

      <a class="myButton">Delete My Account</a>
    </center>
  

    
    
 </body>
</html>