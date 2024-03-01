<?php

session_start();

if (!isset($_SESSION['uid'])) {
    $_SESSION['uid'] = time() * rand();
}
$uid = $_SESSION['uid'];

include_once('./config/db.php');
$sql = "SELECT * from orders";
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

$mycart = 0;
$myorder = [];
for ($i = 0; $i < count($orders); $i++) {
    if ($uid == $orders[$i]['uid']) {
        array_push($myorder, $orders[$i]);
        $mycart += $orders[$i]['quantity'];
    }
}
$_SESSION['myorder'] = $myorder;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/main.min.css" rel="stylesheet">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://kit.fontawesome.com/77a10864d0.js" crossorigin="anonymous"></script>
    <title>Ntandy Foods | Online Shop</title>
</head>

<body>
    <div class="logodiv container-fluid d-flex justify-content-between align-items-center">
        <div>
            <div id="mySidenav" class="sidenav d-inline d-md-none">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./shop.php">Shop</a></li>
                    <li><a href="./products.php">Products</a></li>
                    <li><a href="./gallery.php">Gallery</a></li>
                    <li><a href="./blog.php">Blog</a></li>
                    <li><a href="./contactus.php">Contact Us</a></li>
                    <li><a href="./mycart.php">My Cart</a></li>
                </ul>
            </div>
            <div class="d-inline d-md-none">
                <span style="font-size: 30px; cursor: pointer;" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
            <a href="./index.php"><img class="logo my-2 my-md-3 ms-0 mx-auto ms-md-3" src="./images/logo.png" alt="ntandyfoods_logo" srcset=""></a>
        </div>
        <div class="lead me-3 me-md-5">
            <h2><a href="./mycart.php">
                    <?php if ($mycart < 1) : ?>
                        <sup>0</sup>
                    <?php else : ?>
                        <sup><?php echo $mycart; ?></sup>
                    <?php endif; ?>
                    Items<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></h2>
        </div>
    </div>
    <div class="user container-fluid bg-dark text-light py-3 d-none d-md-block">
        <ul class="d-flex align-items-center py-0 my-0">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./shop.php">Shop</a></li>
            <li><a href="./products.php">Products</a></li>
            <li><a href="./gallery.php">Gallery</a></li>
            <li><a href="./Blog.php">Blog</a></li>
            <li><a href="./contactus.php">Contact Us</a></li>
            <li><a href="./mycart.php">My Cart</a></li>
        </ul>
    </div>