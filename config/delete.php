<?php 
session_start();
require('db.php');

$id = filter_var($_POST['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sql = "SELECT * FROM orders WHERE id = $id";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

$quantity = filter_var($order['quantity'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$sql2 = "DELETE FROM orders WHERE id = $id";

if(mysqli_query($conn, $sql2)){
    $_SESSION['success'] = "You Have Removed $quantity Item(s) From Your Cart";
    header('location: ../mycart.php');
    die();
}

?>