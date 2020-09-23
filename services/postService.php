<?php

require_once('../db/db.php');


function getposts()
{
	$con = dbConnection();
	$sql = "select * from posts";
	$result = mysqli_query($con, $sql);
	$posts = [];
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($posts, $row);
	};
	return $posts;
}

function getpostByid($post_id)
{
	$con = dbConnection();
	$sql = "select * from posts where post_id='{$post_id}'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getraiserid($post_id)
{
	$con = dbConnection();
	$sql = "select * from posts where post_id='{$post_id}'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}
function getdonorid($email)
{
	$con = dbConnection();
	$sql = "select * from posts where post_id='{$post_id}'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}
function addPostByRaiser($post)
{
	$con = dbConnection();
	$sql = "INSERT INTO  posts VALUES('','{$post['title']}','{$post['description']}','{$post['amount']}', '{$post['photo']}', '{$post['id']}','{$post['name']}','{$post['time']}', '{$post['getamount']}' )";
	if (mysqli_query($con, $sql)) {
		return true;
	} else {
		return false;
	}
}

function deletePost($title)
{
	$con = dbConnection();
	$sql = "delete from posts where post_title='{$title}'";

	if (mysqli_query($con, $sql)) {
		return true;
	} else {
		return false;
	}
}
