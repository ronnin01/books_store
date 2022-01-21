
<?php
    include_once('./config/db_connection.php');

    if(isset($_COOKIE['client_username'])){

        $client_username = $_COOKIE['username'];

        _CLIENT_USER_SQL_ = "SELECT * FROM Users Where username = ?";

        $stmt = $pdo->prepare(_CLIENT_USER_SQL_);
        
        $stmt->execute([$client_username]);

        if($row = $stmt->fetchAll()){

        }
        
    }