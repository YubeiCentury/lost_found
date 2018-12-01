<html>
    <head>
        <meta charset="utf-8">
        <title>管理界面</title>
    </head>
    <body>
        <div align="center">
            <?php
            session_start();
            $admin = $_SESSION['admin'];
            echo $admin."进入了管理界面<br>";
            ?>
            <a href="admin-lost.php">管理失物招领</a><br>
            <a href="admin-idcard.php">管理一卡通丢失</a><br>
            <a href="admin-set.php">设置管理员</a><br>
        </div>
        </body>
</html>
