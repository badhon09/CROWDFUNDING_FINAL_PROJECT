<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/donor/css/style.css">
    <title>Donor Login</title>
</head>
<body>
    <div class="wrapper">
        <center>
        <form class="form-signin" method="post" action="../php/LoginController.php">  
          <h2 class="form-signin-heading">Login Panel</h2>
          <h3 class="error-message">
            <?php if(!empty($_SESSION['login_error_msg'])){
                echo $_SESSION['login_error_msg'] ;
                unset($_SESSION['login_error_msg']);
                }
            ?>
          </h3>
          <input type="text" class="form-control" name="email" placeholder="Email Address" autofocus required /><br>
          <input type="password" class="form-control" name="password" placeholder="Password" required /> <br>
          <button class=" myButton" name="submit" type="submit">Login</button> 
        
        </form>
    </center>  
      </div>
</body>
</html>