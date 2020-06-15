<body>
<div class="login-input-table">
    <form action="" method="post">
        <label for="username">用户名
        <input type="text" class="form-control" name="username" placeholder="请输入用户名">
        </label>
        <label for="password">密码
            <input type="password" class="form-control" name="password" placeholder="请输入密码">
        </label>
        <button name="submit" type="submit" class="btn btn-default">登录</button>
    </form>
</div>
</body>
</html>
<?php
include ("include/common.php");
$_SESSION["isLogin"]=FALSE;

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
        $_SESSION["isLogin"]=TRUE;
        echo "<div class=\"alert alert-success\" role=\"alert\"><p>登陆成功，即将跳转到首页</p></div>";
        echo "<script>
                setTimeout(\"javascript:location.href='index.php'\", 1000);
              </script>";
    }
    else{
        $_SESSION["isLogin"]=FALSE;
        echo "<div class=\"alert alert-danger\" role=\"alert\"><p>用户名或密码不正确</p></div>";
    }
}

function getuserpermission($username){
    global $conn;
    $sql = "SELECT permission FROM user WHERE username='".$username."';";
    return mysqli_fetch_assoc(mysqli_query($conn, $sql))["permission"];
}

//Click the login bottom
if (isset($_POST['submit'])) {
    if (isset($_POST["username"]) or isset($_POST["password"])){
        startlogin($_POST["username"], $_POST["password"]);
        $_SESSION["username"]=$_POST["username"];
        $_SESSION["permission"]=getuserpermission($_POST["username"]);
    }
    else{

        echo "<div class=\"alert alert-danger\" role=\"alert\"><p>用户名或密码不能为空</p></div>";
    }
}