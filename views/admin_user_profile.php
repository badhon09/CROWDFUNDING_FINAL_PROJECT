<?php
//session_start();
require_once('../php/sessionController.php');
require_once('../services/userService.php');
require_once('../services/paymentService.php');
require_once('../php/cookieController.php');

$email = $_SESSION['email'];
$a = $_SESSION['user_id'];

$user = getByEmail($email);
$dlist = getAllhistory($a);

$email = $_GET['email'];
$user = getByEmail($email);
$time = date('Y-m-d, g:i a');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./assets/admin/css/style.css">
    <title>Profile</title>
</head>

<body>

    <section>
        <nav>
            <a href="#" class="logo">Crowd Funding</a>
            <ul>
                <li><a href="./admin_home.php">Home </a></li>
                <li><a href="./admin_profile.php">profile</a></li>
                <li><a href="./admin_user.php">Users</a></li>
                <li><a href="./registration.php">Registration</a></li>
                <li><a href="../php/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </section>

    <h1 align="center">My Profile</h1>

    <center>
        <section class="profile">
            <img width="220px" src="../uploads/<?= $user['photo'] ?>">
            <table class="prof_table">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td width="1em"></td>
                        <td><?= $user['fullname'] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td width="1em" </td> <td><?= $user['email'] ?></td>
                    </tr>

                    <tr>
                        <td>Adress:</td>
                        <td width="1em" </td> <td><?= $user['address'] ?></td>
                    </tr>
                    <tr>
                        <td>Contact No:</td>
                        <td width="1em" </td> <td><?= $user['contact'] ?></td>
                    </tr>

                </tbody>
            </table>
        </section><br>
        <a class="myButton" href="./admin_editprofile.php">edit</a>
    </center>


    <h1 align="center">Login History</h1>

    <center>
        <section>
            <table border="1" width="300px" class="prof_table">
                <tbody>
                    <tr>
                        <td>Date</td>
                    </tr>
                    <center>
                        <tr>
                            <td><?= $time ?> </td>
                        </tr>
                    </center>

                </tbody>
            </table>
        </section>
        <br><br>
    </center>


    <h1 align="center">My Donation History</h1>

    <center>
        <section>
            <table border="1" width="600px" class="prof_table">
                <tbody>
                    <tr>
                        <td>Donated To </td>
                        <td>Donated Amount</td>
                        <td>Post ID</td>
                        <td>Donation Date</td>
                    </tr>
                    <center>
                        <?php for ($i = 0; $i != count($dlist); $i++) { ?>
                            <tr>
                                <td><?= $dlist[$i]['r_user_name'] ?> </td>
                                <td><?= $dlist[$i]['amount'] ?></td>
                                <td><?= $dlist[$i]['d_post_id'] ?></td>
                                <td><?= $dlist[$i]['time'] ?></td>
                            </tr>
                        <?php } ?>
                    </center>

                </tbody>
            </table>
        </section>
        <br><br>
        <!-- <form action="./admin_delete.php" method="POST">
            <input type="submit" class="myButton" value="Delete My Account">
        </form> -->
        <a class="myButton" href="./admin_delete.php?email=<?= $email ?>">Delete My Account</a>
    </center>




</body>

</html>