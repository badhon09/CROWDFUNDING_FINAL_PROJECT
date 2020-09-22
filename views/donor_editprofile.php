<?php

	require_once('../php/sessionController.php');	
  require_once('../services/userService.php');	
  require_once('../php/cookieController.php');

  $email=$_SESSION['email'];

  $user = getByEmail($email);
  $a    = $user['user_id'];

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
            <li><a href="./donor_home.php" >Home </a></li>
            <li><a href="./donor_profile.php">profile</a></li>
           <li><a href="../php/logoutController.php">Logout</a></li>
        </ul>
        </nav>
    </section>

        <h1 align="center">My Profile</h1>

<center>
    <section class="profile">
      <form action="../php/donor_profileController.php" method="post" enctype="multipart/form-data">
      <img name="photo" width="220px"src="../uploads/<?=$user['photo']?>">
      <table class="prof_table">
        <tbody>
          <tr>
            <td>Name:</td>
            <td width="1em"></td>
            <td><input name="fullname" type="text" value="<?=$user['fullname']?>"></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td width="1em"</td>
            <td><input name="email" type="text" value="<?=$user['email']?>"></td>
          </tr>
         
          <tr>
            <td>Adress:</td>
            <td width="1em"</td>
            <td><input name="address" type="text" value="<?=$user['address']?>"></td>
          </tr>
          <tr>
            <td>Contact No:</td>
            <td width="1em"</td>
            <td><input name="phoneno" type="text" value="<?=$user['contact']?>"></td>
          </tr>
          <tr>
            <td>Password:</td>
            <td width="1em"</td>
            <td><input name="password" type="text" value="<?=$user['password']?>"></td>
          </tr>
          <input type="hidden" name="id" value="<?=$user['user_id']?>">
          
        </tbody>
      </table>
    </section><br>
    <button type="submit" name="update" class="myButton">Update Profile</button>
    </form>
  </center>




 

    
    
 </body>
</html>