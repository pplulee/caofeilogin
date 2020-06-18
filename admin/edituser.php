<?php
include ("header.php");

function GetUserInfo($id){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE userid='".$id."';");
    if (mysqli_num_rows($result) == 0){
        echo '<div class="alert alert-danger" role="alert"><p>参数有误</p></div>';
        exit;
    }
    $result=mysqli_fetch_assoc($result);
    echo "<form action='' method='post'>";
    echo "
        <div class='form-group'>
        <label>用户ID</label><br>
        <input type='text' class='form-control' name='userid' value='".$result["userid"]."' readonly>
        </div>
    ";
    echo "
        <div class='form-group'>
        <label>用户名</label><br>
        <input type='text' class='form-control' name='username' value='".$result["username"]."' readonly>
        </div>
    ";
    echo "
        <div class='form-group'>
        <label>邮箱</label><br>
        <input type='text' class='form-control' name='email' value='".$result["email"]."' required>
        </div>
    ";
    echo "
        <div class='form-group'>
        <label>密码</label><br>
        <input type='text' class='form-control' name='password' value='' placeholder='不修改请留空' >
        </div>
    ";
    echo "
        <div class='form-group'>
        <label>权限</label><br>
        <input type='text' class='form-control' name='permission' value='".$result["permission"]."' required>
        </div>
    ";
    echo "<input type='submit' name='submit' class='btn btn-primary btn-block' value='确定修改'>";
    echo "</form>";
    if (isset($_POST["submit"])){
        //Change password first
        if ($_POST["password"]!=""){
            mysqli_query($conn, 'UPDATE user SET password="'.$_POST["password"].'" WHERE userid="'.$id.'";');
        }
        mysqli_query($conn, 'UPDATE user SET email="'.$_POST["email"].'" WHERE userid="'.$id.'";');
        mysqli_query($conn, 'UPDATE user SET permission="'.$_POST["permission"].'" WHERE userid="'.$id.'";');
        echo "<div class='alert alert-success' role='alert'><p>修改成功，即将返回用户列表</p></div>";
        echo "<script>
                setTimeout(\"javascript:location.href='user.php'\", 1000);
              </script>";
        exit;
    }
}

GetUserInfo($_GET["id"]);
