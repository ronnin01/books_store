<?php

    include('./config/db_connection.php');

    if(isset($_POST['register'])){
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));


        $SQL_CHECK_USER = "SELECT username FROM Customer WHERE username = ?";

        $stmt = $pdo->prepare($SQL_CHECK_USER);

        $stmt->execute([$username]);

        if($row = $stmt->fetch()){
            echo '
                <script>alert("The username has been used.")</script>
            ';
        }else{

            $SQL_REGISTER = "INSERT INTO Customer(firstname,lastname,email,username,password) VALUES(?,?,?,?,?)";

            $stmt = $pdo->prepare($SQL_REGISTER);

            $stmt->execute([$firstname, $lastname, $email, $username, $password]);

            if($stmt){
                echo'
                    <script>alert("Has been registered")</script>
                ';
            }else{
                echo'
                    <script>alert("Unable to register! please check later.")</script>
                ';
            }

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
    <link rel="stylesheet" type="text/css" href="./static/css/register.css">
    <!-- css link -->

    <link rel="shortcut icon" type="image/png" href="./static/img/logo.png" />

    <title>Book Store</title>
</head>
<body>
    <div class="register-container">
        <div class="text-register">
            <h1>REGISTER</h1>
        </div>
        <div class="register-form">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                <div class="firstname-input">
                    <input type="text" placeholder="Firstname" name="firstname">
                </div>
                <div class="lastname-input">
                    <input type="text" placeholder="Lastname" name="lastname">
                </div>
                <div class="email-input">
                    <input type="email" placeholder="Email" required name="email">
                </div>
                <div class="user-input">
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="pass-input">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="register-btn">
                    <input type="submit" value="Register" name="register">
                </div>
            </form>
        </div>
        <div class="back-container">
            <br>
            <a href="http://localhost/books/login.php">Already have an account?</a>
        </div>
    </div>
</body>
</html>