<?php

    include_once('./config/db_connection.php');

    if(isset($_POST['login-btn'])){

        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));
        
        $SQL_LOGIN_QUERY = "SELECT username, password, c_id FROM Customer WHERE username = ? AND password = ?";

        $stmt = $pdo->prepare($SQL_LOGIN_QUERY);

        $stmt->execute([$username,$password]);

        if($row = $stmt->fetch()){
            setcookie('username', $username);
            setcookie('customer_id', $row['c_id']);
            header('location: http://localhost/books/index.php');
        }else{
            echo "<script>alert('Wrong username and password');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap and Fontawesome cdn-->
    <?php include_once('./config/cdn.php');?>
    <!-- Bootstrap and Fontawesome cdn-->

    <!-- css link -->
    <link rel="stylesheet" type="text/css" href="./static/css/login.css">
    <!-- css link -->

    <link rel="shortcut icon" type="image/png" href="./static/img/logo.png" />

    <title>Book Sale</title>
</head>
<body>
    <div class="login-container">
        <div class="text-login">
            <h1>WELCOME</h1>
        </div>
        <div class="login-form">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                <div class="input-user">
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="input-pass">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="btn-login">
                    <input type="submit" value="Sign In" name="login-btn">
                </div>
            </form>
        </div>
        <div class="forgot-password-container">
            <br>
            <a href="http://localhost/books/register.php">No account yet?</a>
        </div>
    </div>
</body>
</html>