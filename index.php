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
    <!-- Navigation bar headers -->
    <div class="nav-bar-container">
        <nav class="nav-bar">
            <h2>Books Sale</h2>
            <form class="nav-search" action="<?= $_SERVER['PHP_SELF']?>" method="POST">
                <input type="text" name="search-input" placeholder="Search Books" id="search">
                <button type="submit" name="search-btn"><i class="fa fa-search"></i></button>
            </form>
            <?php
                function nav_bar(){
                    include('./config/db_connection.php');

                    if(isset($_COOKIE['username'])){
                        echo '
                            <ul>
                                <li><a href="">View Orders</a></li>
                                <li><a href="">Cart</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        ';
                    }else{
                        echo '
                            <ul>
                                <li><a href="">View Orders</a></li>
                                <li><a href="">Cart</a></li>
                                <li><a href="http://localhost/books/login.php">LogIn</a></li>
                                <li><a href="http://localhost/books/register.php">Sign Up</a></li>
                            </ul>
                        ';
                    }
                }

                nav_bar();
            ?>
        </nav>
        <nav class="nav-bar-menu" id="nav-slide-menu-bar">
            <i class="fas fa-bars"></i>
        </nav>
    </div>
    <!-- Navigation bar headers -->

    <!-- Navigation bar for slide menus -->
    <div class="nav-bar-menu-list" id="nav-bar-menu-list" style="display: none;">
        <?php
            nav_bar();
        ?>
    </div>
    <!-- Navigation bar for slide menus -->

    <!-- Book Genre -->
    <div class="book-genre">
        <div class="genre">
            <ul>
                <li><a href="http://localhost/books/index.php?genre=fantasy">Fantasy</a></li>
                <li><a href="http://localhost/books/index.php?genre=sci-fi">Sci-Fi</a></li>
                <li><a href="http://localhost/books/index.php?genre=mystery">Mystery</a></li>
                <li><a href="http://localhost/books/index.php?genre=thriller">Thriller</a></li>
                <li><a href="http://localhost/books/index.php?genre=romance">Romance</a></li>
                <li><a href="http://localhost/books/index.php?genre=comedy">Comedy</a></li>
                <li><a href="http://localhost/books/index.php?genre=western">Western</a></li>
                <li><a href="http://localhost/books/index.php?genre=dystopian">Dystopian</a></li>
                <li><a href="http://localhost/books/index.php?genre=contemporary">Contemporary</a></li>
            </ul>
        </div>
    </div>
    <!-- Book Genre -->

    <!-- Top books purchase -->
    <div class="top-books">
        <div class="books">
            <div class="book1">
                <img src="./static/img/image1.png" alt="">
            </div>
            <div class="book2">
                <img src="./static/img/image1.png" alt="">
            </div>
            <div class="book3">
                <img src="./static/img/image1.png" alt="">
            </div>
        </div>
    </div>
    <!-- Top books purchase -->

    <!-- Books Sale -->
    <div class="books-container">
        <div class="books-sale-text">
            <h3>Best books to buy</h3>
            <p>We got all you want to read in here</p>
        </div>

        <div class="books-products-container">
        <!-- php syntax -->
            <?php

                // function for get all the products in index.php
                function get_products(){
                    include('./config/db_connection.php');

                    $SQL_GET_BOOKS = 'SELECT * FROM Books WHERE ?';
                
                    $stmt = $pdo->prepare($SQL_GET_BOOKS);

                    $stmt->execute([1]);
                    
                    while($row = $stmt->fetch()){
                        echo '

                            <a href="http://localhost/books/product.php?id='.$row['b_id'].'" class="books-products">
                                <div class="img">
                                    <img src="./static/img/image1.png" alt="">
                                </div>
                                <div class="book-name">
                                    <p><strong>'.$row['b_name'].'</strong></p>
                                </div>
                                </br>
                                <div class="price">
                                    <h2>
                                        $'.$row['b_price'].'
                                    </h2>
                                </div>
                                </br>
                                <div class="rate" style="display: flex;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <p>1,234,563 views</p>
                                </div>
                            </a>
                        
                        ';
                    }

                }
                // function for get all the products in index.php


                // function for get all the products by there genre
                function get_products_genre($genre){
                    include('./config/db_connection.php');

                    $SQL_GET_BOOKS_GENRE = "SELECT * FROM Books WHERE b_genre = ?";

                    $stmt = $pdo->prepare($SQL_GET_BOOKS_GENRE);

                    $stmt->execute([$genre]);
                    
                    $count = $stmt->rowCount();
                    
                    if($count < 1){
                        echo "NO BOOKS!";
                    }else{

                        while($row = $stmt->fetch()){
                            echo '
    
                                <a href="http://localhost/books/product.php?id='.$row['b_id'].'" class="books-products">
                                    <div class="img">
                                        <img src="./static/img/image1.png" alt="">
                                    </div>
                                    <div class="book-name">
                                        <p><strong>'.$row['b_name'].'</strong></p>
                                    </div>
                                    </br>
                                    <div class="price">
                                        <h2>
                                            $'.$row['b_price'].'
                                        </h2>
                                    </div>
                                    </br>
                                    <div class="rate" style="display: flex;">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <p>1,234,563 views</p>
                                    </div>
                                </a>
                            
                            ';
                        }

                    }

                }
                // function for get all the products by there genre

                if(isset($_POST['search-btn'])){
                    
                    if($_POST['search-input'] == ""){
                        get_products();
                    }
                    else{
                        echo 'hello world lang';
                    }

                }else{

                    if($_GET['genre']=='fantasy'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='sci-fi'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='mystery'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='thriller'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='romance'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='comedy'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='western'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='dystopian'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else if($_GET['genre']=='contemporary'){
                        $genre = $_GET['genre'];
                        get_products_genre($genre);
                    }else{  
                        get_products();
                    }
                }

            ?>
            <!-- php syntax -->
        </div>
    </div>
    <!-- Books Sale -->

    <!-- footer -->
    <div class="footer">

        <div class="footer-container">
            <p><strong>&copy; Aaron Fulgar <?= date('m-d-Y')?></strong></p>
        </div>

    </div>
    <!-- footer -->
    <!-- static java script link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./static/js/events.js"></script>
    <!-- static java script link -->
</body>
</html>