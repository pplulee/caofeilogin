<?php
include("include/common.php");
echo "<body>
<nav class='navbar navbar-default' role='navigation'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <a class='navbar-brand' href=''>".$sitename."</a>
        </div>
        <div>
            <ul class='nav navbar-nav'>
                <li><a href='./admin/index.php'>管理员面板</a></li>
                <a href='./index.php?logout'><button name='logout' type='submit' class='btn btn-default'>注销</button></a>
            </ul>
        </div>
    </div>
</nav>
</body>";