<?php

require_once('../db/db.php');

function payment($payment){

    $con = dbConnection();

    $sql = "insert into donationlist values('','{$payment['donorid']}','{$payment['raiserid']}','{$payment['postid']}','{$payment['time']}','{$payment['donorname']}', '{$payment['raisername']}','{$payment['amount']}')";
    
    if(mysqli_query($con, $sql)){
        header('location: ../views/donor_home.php');
        return true;
    }else{
        return false;
    }
}

function getdonorname($id){

    $con = dbConnection();
    $sql = "select * from users where user_id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;

}

function getAllhistory($id){
    $con = dbConnection();
    $sql = "select * from donationlist where d_user_id='{$id}'";
    $result = mysqli_query($con, $sql);
    $cmnt =[];
    while($row = mysqli_fetch_assoc($result)){
        array_push($cmnt, $row);
    };
    return $cmnt;
}

?>