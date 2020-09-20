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

          <h2 class="form-signin-heading">Please login</h2>
          <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" /><br>
          <input type="password" class="form-control" name="password" placeholder="Password" required=""/> <br>     
          
          <button class=" myButton" name="submit" type="submit">Login</button> 
        
        </form>
    </center>  
      </div>
</body>
</html>