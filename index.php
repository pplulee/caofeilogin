<?php
include ("header.php");
if (!$conn){
    echo "<div class=\"alert alert-danger\" role=\"alert\"><h3>警告：MySQL连接失败</h3></div>";
    exit;
}

if (!$_SESSION["isLogin"]){
    echo "<div class=\"alert alert-warning\" role=\"alert\"><p>你还没有登录\n</p></div>";
    echo "<a href=\"login.php\"><button type=\"button\" class=\"btn btn-primary\">去登陆</button></a>";
    exit;
}

echo "<div class=\"alert alert-success\" role=\"alert\"><h2>你好，".$_SESSION["username"]."\n</h2></div>";

if (isset($_GET["logout"])){
    logout();
}
?>

