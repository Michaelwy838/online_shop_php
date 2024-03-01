<?php
session_start();
require_once('db.php');
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $product = filter_var($_POST['product'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $size = filter_var($_POST['size'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(empty($quantity)){
        $_SESSION['error'] = "quantity cannot be empty";
    }
    if(isset($_SESSION['error'])){
        header('location: ../mycart.php');
    }else{
        $sql = "UPDATE orders SET quantity = '$quantity' WHERE id = '$id'";
        if(mysqli_query($conn, $sql)){
            $_SESSION['success'] = "You have changed the quantity of $product - $size to $quantity in your cart";
            header('location: ../mycart.php');
        }
    }
}

?>