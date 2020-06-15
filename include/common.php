<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("PRC");
define('ROOT', dirname(__FILE__).'/');
include ROOT.'../config.php';

/**
//Enable error reporting
ini_set("display_errors","On");
error_reporting(E_ALL);
**/

session_start();
$conn = mysqli_connect($servername, $username, $password, $dbname);

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

//Initialize bootstrap
echo'<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>曹飞Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>'

?>
