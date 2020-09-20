<?php

function payment($payment){
    $con = dbConnection();

    $sql = "insert into donationlist values('','{$payment['donorid']}','{$payment['raiserid']}','{$payment['postid']}','{$payment['donorname']}', '{$payment['raisername']}','{$payment['amount']}')";
    
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


?>