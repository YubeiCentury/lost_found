<?php
    $dbtype = "mysql";
    $servername = "127.0.0.1:3306";
    $username = "root";
    $pswd = "root";
    $dbname= "phptest";
    $dsn="$dbtype:host=$servername;dbname=$dbname";

    try {
        $dbh = new PDO($dsn, $username, $pswd); //初始化一个PDO对象
        echo "success<br/>";
        foreach ($dbh->query('SELECT * from login') as $row) {
            print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
        }
        $dbh = null;
    } catch (PDOException $e) {
        die ("Error!: " . $e->getMessage() . "<br/>");
    }
?>