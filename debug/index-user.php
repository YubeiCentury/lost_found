<html>
    <head>
        <meta charset="utf-8">
        <title>首页</title>
    </head>
    <body>
        <div align="center">
            <?php
            session_start();
            $user = $_SESSION['user'];
            echo $user."进入了用户界面<br>";
            ?>
            <a href="user-lost.html">物品拾取</a><br>
            <a href="user-idcard.html">一卡通拾取</a><br>
            <a href="user-show.html">进入失物展示大厅</a><br>
            <a href="user-rank.html">查看排行</a><br>
            <form action="../posts/qq/" method="GET">
                <input type="submit">
            </form>
        </div>
        </body>
</html>
