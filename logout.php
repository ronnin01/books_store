<?php
    if(isset($_COOKIE['username'])){
        setcookie("username", "", time() - 3600);
        header("location: http://localhost/books/index.php");
    }else{
        header("location: http://localhost/books/index.php");
    }

    header("location: http://localhost/books/index.php");
?>