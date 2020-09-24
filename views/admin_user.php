<?php
//session_start();
require_once('../php/sessionController.php');
require_once('../services/userService.php');
require_once('../php/cookieController.php');

$email = $_SESSION['email'];
$a = $_SESSION['user_id'];

$user = getAllUser();
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
                <li><a href="./registration.php">Add User</a></li>
                <li><a href="../php/logoutController.php">Logout</a></li>
            </ul>
        </nav>
    </section>
    <br><br>

    <center>

        <input type="text" id="search" onkeyup="search()">
        <br><br>
        <div id="result"></div>
        <hr>

    </center>

    <h1 align="center">Users</h1>

    <center>
        <section>
            <table border="1" width="1000px" class="prof_table">
                <tbody>
                    <tr>
                        <td>Full Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Contact</td>
                        <td>Type</td>
                        <td>Action</td>
                    </tr>
                    <center>
                        <?php for ($i = 0; $i != count($user); $i++) { ?>
                            <tr>
                                <td><?= $user[$i]['fullname'] ?> </td>
                                <td><?= $user[$i]['email'] ?></td>
                                <td><?= $user[$i]['address'] ?></td>
                                <td><?= $user[$i]['contact'] ?></td>
                                <td><?= $user[$i]['type'] ?></td>
                                <td><a class="myButton" href="./admin_user_profile.php?email=<?= $user[$i]['email'] ?>">View</a></td>
                            </tr>
                        <?php } ?>
                    </center>

                </tbody>
            </table>
        </section>
        <br><br>
    </center>

    <script type="text/javascript">
        function search() {
            var search = document.getElementById('search').value;
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../php/searchController.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send('search=' + search);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('result').innerHTML = this.responseText;

                }
            }
        }
    </script>
</body>

</html>