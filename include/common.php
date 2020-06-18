<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("PRC");
define('ROOT', dirname(__FILE__).'/');
include ROOT.'../config.php';
include ("function.php");

/**
//Enable error reporting
ini_set("display_errors","On");
error_reporting(E_ALL);
**/

//Initialize session
session_start();
if (!(isset($_SESSION["isLogin"]))){
    $_SESSION["isLogin"]=FALSE;
}
if (!(isset($_SESSION["permission"]))){
    $_SESSION["permission"]=0;
}
$conn = mysqli_connect($servername, $username, $password, $dbname);



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
