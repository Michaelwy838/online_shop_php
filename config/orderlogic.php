<?php
session_start();
require('db.php');
$pid = filter_var($_POST['pid'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// print_r($_SESSION['myorder']);
// die();
if (isset($_POST["submit$pid"])) {
    $size = filter_var($_POST['size'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $product = filter_var($_POST['product'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (empty($size) || empty($quantity)) {
        $_SESSION['error'] = 'All Fields are required';
    } elseif ($quantity < 1) {
        $_SESSION['error'] = 'Quantity should be 1 or greater';
    } else {
        for ($i = 0; $i < count($_SESSION['myorder']); $i++) {
            if ($_SESSION['myorder'][$i]['size'] == $size && $_SESSION['myorder'][$i]['product'] == $product) {
                $_SESSION['error'] = 'The product you selected already exists in your cart, check cart to change quantity';
            }
        }
    }
    if (isset($_SESSION['error'])) {
        header('location: ../shop.php');
        die();
    } else {
        $uid = $_SESSION['uid'];
        $sql = "INSERT into orders(product, size, quantity, uid) VALUES('$product', '$size', '$quantity', '$uid')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "$quantity item(s) added to your Cart";
            header(('location: ../shop.php'));
            die();
        }
    }
}
