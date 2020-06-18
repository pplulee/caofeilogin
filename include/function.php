<?php
//Function for justify user's permission
//3=Admin  2=Teacher  1=Student  0=Banned_User / Guest
function isadmin(){
    if ($_SESSION["permission"] < 3){
        return FALSE;
    }
    else{
        return TRUE;
    }
}

function isteacher(){
    if ($_SESSION["permission"] < 2){
        return FALSE;
    }
    else{
        return TRUE;
    }
}

function isstu(){
    if ($_SESSION["permission"] < 1){
        return TRUE;
    }
    else{
        return TRUE;
    }
}

//Function for logout
function logout(){
    unset($_SESSION['isLogin']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['permission']);
    exit("<script language='javascript'>alert('你已成功注销');window.location.href='./index.php';</script>");
}

//Get user's name by userID
function getname($userid){
    global $conn;
    return mysqli_fetch_assoc(mysqli_query($conn, "SELECT username FROM user WHERE userid='".$userid."';"))['username'];
}
