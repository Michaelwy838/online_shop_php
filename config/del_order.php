<?php
session_start();
require_once('db.php');
$id = filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS);
if(isset($_POST["submit$id"])){
    $uid = filter_var($_POST['uid'], FILTER_SANITIZE_SPECIAL_CHARS);

    $sql1 = "DELETE from userdetails WHERE uid = '$uid'";
    $sql = "DELETE from orders WHERE uid = '$uid'";
    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)){
        $_SESSION['success'] = 'You Have Deleted an order';
        header('location: orders.php');
        die();
    }
}

?>