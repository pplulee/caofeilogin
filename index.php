<!DOCTYPE html>
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
</html>
<?php
include ("include/common.php");
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
echo "<a href=\"./index.php?logout\"><button name=\"logout\" type=\"submit\" class=\"btn btn-default\">注销</button></a>";

if (isset($_GET["logout"])){
    logout();
}
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">服务器信息</h3>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <b>PHP 版本：</b><?php echo phpversion() ?>
            <?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
        </li>
        <li class="list-group-item">
            <b>MySQL 版本：</b><?php echo mysqli_get_server_version($conn) ?>
        </li>
        <li class="list-group-item">
            <b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
        </li>

        <li class="list-group-item">
            <b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
        </li>
        <li class="list-group-item">
            <b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
        </li>
        <li class="list-group-item">
            <b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
        </li>
        <li class="list-group-item">
            <b>程序开发 by @baiyimiao</b>
        </li>
    </ul>
</div>
