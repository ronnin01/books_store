<?php

    function buy_product(){

    }

    function add_cart(){
        include('./config/db_connection.php');

        $customer_id = $_COOKIE['customer_id'];
        $quantity = $_POST['quantity'];
        $book_id = $_GET['id'];

        if(isset($_POST['cart-btn'])){

            $SQL_PRICE = "SELECT b_price FROM Books WHERE b_id = ?";
            $stmt = $pdo->prepare($SQL_PRICE);
            $stmt->execute([$book_id]);
            $row = $stmt->fetch();
            
            $total_price = $quantity * $row['b_price'];

            $SQL_ADD_CART = "INSERT INTO Cart(c_id, quantity, b_id, total_price) VALUES(?,?,?,?)";

            $stmt = $pdo->prepare($SQL_ADD_CART);

            $stmt->execute([$customer_id, $quantity, $book_id, $total_price]);
        }
    }

    //functions
    buy_product();
    add_cart();

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
    <link rel="stylesheet" type="text/css" href="./static/css/style.css">
    <!-- css link -->

    <link rel="shortcut icon" type="image/png" href="./static/img/logo.png" /> 

    <title>Book Sale</title>
</head>
<body>
    <?php 
    
        if(isset($_GET['id'])){
            include('./config/db_connection.php');

            $quantity_count = 0;

            $book_id = $_GET['id'];

            $SQL_GET_BOOK = "SELECT * FROM Books WHERE b_id = ?";

            $stmt = $pdo->prepare($SQL_GET_BOOK);

            $stmt->execute([$book_id]);

            if($row = $stmt->fetch()){
                while($quantity_count < $row['b_quantity']){
                    $quantity_count++;
                }

                echo '

                    <div class="get-book">
                        <div class="book-img">
                            <img src="./static/img/image1.png" alt="">
                        </div>
                        <div class="details">
                            <div class="title">
                                <h1>'.$row['b_name'].'</h1>
                            </div>
                            <div class="price">
                                <h3>&#8369;'.$row['b_price'].'</h3>
                            </div>
                            <div class="description">
                                <p>'.$row['b_description'].'</p>
                            </div>
                            <div class="buy-btn">
                                <form action="http://localhost/books/product.php?id='.$row['b_id'].'" method="POST">
                                    <input type="number" name="quantity" min="1" max="'.$quantity_count.'" >
                                    <button type="submit" name="buy-btn">Buy</button>
                                    <button type="submit" name="cart-btn">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                
                ';
            }
        }
    ?>


    <style type="text/css">
        /* 
            google fonts import links
        */
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto&family=Satisfy&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: 'Roboto', sans-serif;
            color: black;
        }
        .get-book{
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 30px;
        }
        .book-img img{
            width: 300px;
            height: 400px;
        }
    </style>
</body>
</html>