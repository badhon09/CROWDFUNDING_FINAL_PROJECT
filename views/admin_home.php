<?php
require_once('../php/sessionController.php');
require_once('../php/cookieController.php');
require_once('../services/postService.php');
require_once('../services/userService.php');
//require_once('../../db/db.php');
$user = getByEmail($_SESSION['email']);
$a    = $user['user_id'];
$_SESSION['user_id'] = $a;


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./assets/admin/css/style.css">
    <title>Home</title>
</head>

<body>

    <section>
        <nav>
            <a href="#" class="logo">Crowd Funding</a>
            <ul>
                <li><a href="./admin_home.php">Home </a></li>
                <li><a href="./admin_profile.php">profile</a></li>
                <li><a href="./admin_user.php">Users</a></li>
                <li><a href="./registration.php">Add User</a></li>
                <li><a href="../php/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </section>
    <br><br>


    <div class="postarea">
        <div class="title">
            <h1 align="center">Raisers Posts</h1>
        </div>

        <?php
        $posts = getposts();

        ?>

        <center>
            <div class="postcards">
                <?php for ($i = 0; $i != count($posts); $i++) { ?>
                    <div class="card">
                        <img width="220px" src="./assets/pics/xxx.jpg" alt="Avatar">

                        <h4><b><?= $posts[$i]['post_title'] ?></b></h4>
                        <p><?= $posts[$i]['user_name'] ?></p>
                        <a href="./donor_postdetails.php?postid=<?= $posts[$i]['post_id'] ?>" class="myButton">Details</a>
                        <a href="./admin_delete.php?post_title=<?= $posts[$i]['post_title'] ?>" class="myButton">Delete</a>

                    </div>

                <?php } ?>

            </div>
        </center>

    </div>

</body>

</html>