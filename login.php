<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<form action="" method="post">
    用户名:<label>
        <input type="text" name="username">
    </label>
    密码:<label>
        <input type="password" name="password">
    </label>
    <input type="submit" name="submit" value="登录">
</form>
</body>
</html>
<?php
require "config.php";
session_start();
$_SESSION["islogin"]=FALSE;

function login($username,$password){
    global $conn;
    $sql = "SELECT username FROM user WHERE username='".$username."';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0){
        return FALSE;
    }
    else{
        $sql = "SELECT password FROM user WHERE username='".$username."';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_fetch_assoc($result)["password"] == $password){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}

function startlogin($username,$password){
    if (login($username,$password) == TRUE){
        echo "登陆成功，即将跳转到首页\n";
        echo "<script>
                setTimeout(\"javascript:location.href='index.php'\", 1000);
              </script>";
    }
    else{
        echo "登陆失败，用户名或密码错误\n";
    }
}

function getuserpermission($username){
    global $conn;
    $sql = "SELECT permission FROM user WHERE username='".$username."';";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))["permission"];
}

//Click the login bottom
if ($_POST['submit']) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (($username=="") or ($password=="")){
        echo "用户名或密码不能为空\n";
    }
    else{
        startlogin($username, $password);
        $islogin=TRUE;
        $_SESSION["username"]=$username;
        $_SESSION["islogin"]=TRUE;
        $_SESSION["permission"]=getuserpermission($username);
    }
}