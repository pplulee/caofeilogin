<?php
require "config.php";
session_start();
if (!$conn){
    echo "错误：MySQL连接失败\n";
    exit;
}

if (!$_SESSION["islogin"]){
    echo "你还没有登录\n";
    echo "<a href=\"login.php\">去登陆</a>";
    exit;
}

echo "你好,".$_SESSION["username"]."\n";
echo "你的权限是：".$_SESSION["permission"]."\n";
echo "<a href=\"/admin/user.php\">用户管理</a>";
