<?php
    $dbtype = "mysql";
    $servername = "127.0.0.1:3306";
    $username = "root";
    $pswd = "root";
    $dbname= "phptest";
    $dsn="$dbtype:host=$servername;dbname=$dbname";

    try {
        $db = new PDO($dsn, $username, $pswd);
        $db->query("SET NAMES 'utf8'");
	    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        $json = array(
            $error => 500,
            $msg => "Internal Server Error"
        );
        echo json_encode($json);
        die ();
    }
?>