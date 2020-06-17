<?php
include ("../include/common.php");
if (isadmin()==FALSE OR $_SESSION['isLogin']==FALSE){
    echo "<div class=\"alert alert-danger\" role=\"alert\"><h3>你没有权限访问该页面</h3></div>";
    echo "<a href=\"../index.php\"><button type=\"button\" class=\"btn btn-primary\">去首页</button></a>";
    exit;
}

//Nav bar
echo '
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">曹飞Login 管理面板</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="../index.php">网站首页</a></li>
                <li><a href="./index.php">后台首页</a></li>
                <li><a href="./user.php">用户管理</a></li>
            </ul>
        </div>
    </div>
</nav>
</body>';
