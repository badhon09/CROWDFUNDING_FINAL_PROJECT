<?php

require_once('../php/sessionController.php');
require_once('../services/postService.php');
require_once('../services/userService.php');
require_once('../services/commentService.php');
require_once('../php/cookieController.php');

$user = getByEmail($_SESSION['email']);
$a    = $user['user_id'];

$posts = getpostByid($_GET['postid']);
$_SESSION['post_id'] = $_GET['postid'];
// $_SESSION['raiser_id']=$posts['user_id'];
$user = getByEmail($_SESSION['email']);




$cmnt = getAllComments($_SESSION['post_id']);
$mycmnt = getCommentById($a, $_SESSION['post_id']);



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
                <li><a href="index.php" class="active">Home </a></li>
                <li><a href="registration.php">Sign up</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="about_us.html">About Us</a></li>
            </ul>
        </nav>
    </section>



    <section class="postdescription">

        <div class="cardpost postdes">
            <h3><?= $posts['post_title'] ?></h3>
            <img width="400px" src="./assets/pics/xxx.jpg" />
            <p>Posted on : <?= $posts['post_time'] ?></p>
            <p>
                <?= $posts['post_details'] ?>
            </p>
            <p>posted by : <?= $posts['user_name'] ?></p>


            <hr>
            Add Comment:
            <form action="../php/commentController.php" method="post">
                <input type="text" name="comment" required>
                <input type="hidden" name="pid" value="<?php echo $_GET['postid'] ?>">
                <input type="hidden" name="uid" value="<?php echo $user['user_id'] ?>">
                <input type="hidden" name="name" value="<?php echo $user['fullname'] ?>">
                <button type="submit" name="submit">comment</button>


            </form>
            <br>

            My Comments:
            <?php for ($i = 0; $i != count($mycmnt); $i++) { ?>

                <p><b>Name: <?= $mycmnt[$i]['name'] ?></b></p>
                <p> <?= $mycmnt[$i]['comment'] ?></p>
                <a href="../php/commentController.php?cid=<?= $mycmnt[$i]['comment_id'] ?>">Delete</a>
                <hr>



            <?php } ?>

            <hr>


            Recent Comments:
            <?php for ($i = 0; $i != count($cmnt); $i++) { ?>

                <p><b>Name: <?= $cmnt[$i]['name'] ?></b></p>
                <p> <?= $cmnt[$i]['comment'] ?></p>
                <hr>



            <?php } ?>

        </div>



        <div class="carddonate">
            <form action="../php/paymentController.php" method="post">
                <h1 align="center">Make Donation</h1>
                <progress class="amount-progress" value="<?php echo $posts['getamount'] ?>" max="<?php echo $posts['post_amount'] ?>">70 %</progress>
                <br><br>
                <center>
                    <input type="text" class="tb5" name="donation"> <br><br>

                    <a href="registration.php" class="myButton">Donate</a>
                    <h3>Amount got :<?= $posts['getamount'] ?></h3>
                    <h3>Amount Wants:<?= $posts['post_amount'] ?></h3>
                </center>
            </form>

        </div>




    </section>



</body>

</html>