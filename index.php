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
    <link rel="stylesheet" type="text/css" href="./static/css/index.css">
    <!-- css link -->

    <link rel="shortcut icon" type="image/png" href="./static/img/logo.png" />

    <title>Book Sale</title>
</head>
<body>
    <!-- Navigation bar headers -->
    <div class="nav-bar-container">
        <nav class="nav-bar">
            <h2>Books Sale</h2>
            <div class="nav-search">
                <input type="text" placeholder="Search Books" id="search">
                <button type="button"><i class="fa fa-search"></i></button>
            </div>
            <ul>
                <li><a href="">View Orders</a></li>
                <li><a href="">Cart</a></li>
                <li><a href="">LogIn</a></li>
                <li><a href="">Sign Up</a></li>
            </ul>
        </nav>
        <nav class="nav-bar-menu" id="nav-slide-menu-bar">
            <i class="fas fa-bars"></i>
        </nav>
    </div>
    <!-- Navigation bar headers -->

    <!-- Navigation bar for slide menus -->
    <div class="nav-bar-menu-list" id="nav-bar-menu-list" style="display: none;">
        <ul>
            <li><a href="">View Orders</a></li>
            <li><a href="">Cart</a></li>
            <li><a href="">LogIn</a></li>
            <li><a href="">Sign Up</a></li>
        </ul>
    </div>
    <!-- Navigation bar for slide menus -->

    <!-- Book Genre -->
    <div class="book-genre">
        <div class="genre">
            <ul>
                <li><a href="">Fantasy</a></li>
                <li><a href="">Sci-Fi</a></li>
                <li><a href="">Mystery</a></li>
                <li><a href="">Thriller</a></li>
                <li><a href="">Romance</a></li>
                <li><a href="">Comedy</a></li>
                <li><a href="">Western</a></li>
                <li><a href="">Dystopian</a></li>
                <li><a href="">Contemporary</a></li>
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
            <h3>Best books to by</h3>
            <p>We got all you want to read in here</p>
        </div>

        <div class="books-products-container">
        <!-- php syntax -->
            <?php
                include_once('./config/db_connection.php');

                $SQL_GET_BOOKS = 'SELECT * FROM Books WHERE ?';
                
                $stmt = $pdo->prepare($SQL_GET_BOOKS);

                $stmt->execute([1]);
                
                while($row = $stmt->fetch()){
                    echo '

                        <div class="books-products">
                            '.$row['b_name'].'
                        </div>
                    
                    ';
                }

            ?>
            <!-- php syntax -->
        </div>
    </div>
    <!-- Books Sale -->

    <!-- static java script link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./static/js/events.js"></script>
    <!-- static java script link -->

    <style>
        .books-container{
            margin-top: 50px;
            width: 100%;
            height: auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .books-sale-text{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .books-products-container{
            position: relative;
            display: grid;
            margin-top: 30px;
            grid-template-columns: auto auto auto;
            grid-gap: 1fr;
        }
    </style>
</body>
</html>