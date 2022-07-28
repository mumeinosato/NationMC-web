<?php
require_once 'env.php';
function connect()
{
    $host = DB_host;
    $db = DB_name;
    $user = DB_user;
    $pass = DB_pass;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
 
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch(PDOException $e) {
        echo '接続失敗'. $e->getMessage();
        exit();
    }


}


?>