<?php
require_once('../services/userService.php');
require_once('../services/postService.php');
require_once('../db/db.php');

$email = $_GET['email'];
$title = $_GET['post_title'];
if ($email) {
    $status = delete($email);

    if ($status) {
        header('location: ../views/admin_user.php');
    } else {
        header('location: ../views/admin_delete.php?error');
    }
}
if ($title) {
    $status = deletePost($title);

    if ($status) {
        header('location: ../views/admin_home.php');
    } else {
        header('location: ../views/admin_delete.php?error');
    }
}
