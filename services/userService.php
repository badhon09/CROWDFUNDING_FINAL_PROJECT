<?php

require_once('../db/db.php');
//include('../db/db.php');


function getByEmail($email)
{
	$con = dbConnection();
	$sql = "select * from users where email='{$email}'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getAllUser()
{
	$con = dbConnection();
	$sql = "select * from users";
	$result = mysqli_query($con, $sql);
	$users = [];
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($users, $row);
	};
	return $users;
}

function validate($user)
{
	$con = dbConnection();
	$sql = "select * from users where email='{$user['email']}' and password='{$user['password']}'";

	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);

	if (count($row) > 0) {
		return true;
	} else {
		return false;
	}
}

function create($user)
{
	$con = dbConnection();
	$sql = "insert into users values('','{$user['fullname']}','{$user['email']}','{$user['address']}','{$user['phoneno']}', '{$user['photo']}','{$user['password']}','{$user['type']}' )";

	if (mysqli_query($con, $sql)) {
		echo "registration done";
		return true;
	} else {
		return false;
	}
}

function update($user)
{
	$con = dbConnection();
	$sql = "update users set fullname='{$user['fullname']}',email='{$user['email']}',address='{$user['address']}',contact='{$user['phoneno']}', password='{$user['password']}' where user_id={$user['id']}";

	if (mysqli_query($con, $sql)) {
		return true;
	} else {
		return false;
	}
}

function delete($email)
{
	$con = dbConnection();
	$sql = "delete from users where email='{$email}'";

	if (mysqli_query($con, $sql)) {
		return true;
	} else {
		return false;
	}
}
