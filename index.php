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
    <link rel="stylesheet" href="./static/css/style.css">
    <!-- css link -->

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
    <div class="top-books-container">
        <div class="top-books">

        </div>
    </div>
    <!-- Top books purchase -->

    <!-- static java script link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./static/js/events.js"></script>
    <!-- static java script link -->
</body>
</html>