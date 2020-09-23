<?php
require_once('../services/userService.php');
require_once('../db/db.php');
//include('../db/db.php');

if (isset($_POST['update'])) {

    $fullname     = $_POST['fullname'];
    $email         = $_POST['email'];
    $address    = $_POST['address'];
    $phoneno    = $_POST['phoneno'];
    $id         = $_POST['id'];


    $password     = $_POST['password'];
    $type       = $_POST['type'];

    move_uploaded_file($_FILES["photo"]["tmp_name"], "../uploads/" . $_FILES["photo"]["name"]);
    $photo = $_FILES["photo"]["name"];

    $user = [
        'fullname'    => $fullname,
        'email'        => $email,
        'address'    => $address,
        'phoneno'   => $phoneno,
        'photo'        => $photo,
        'password'    => $password,
        'type'        => $type,
        'id'        => $id
    ];

    $status = update($user);

    if ($status) {
        header('location: ../views/admin_profile.php');
    } else {
        header('location: ../views/registration.php');
    }
}
