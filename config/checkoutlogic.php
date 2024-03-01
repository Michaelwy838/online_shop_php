<?php
session_start();
require_once('db.php');
if (isset($_POST['submit'])) {
    $name = filter_var( $_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $phonenumber = filter_var($_POST['phonenumber'], FILTER_SANITIZE_SPECIAL_CHARS);
    $district = filter_var($_POST['district'], FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_SPECIAL_CHARS);

    if($_SESSION['total'] < 30000){
        $_SESSION['error'] = 'Cart Total should be more than Shs 30,000 to checkout';
    }
    elseif (empty($name) || empty($phonenumber) || empty($district) || empty($address)) {
        $_SESSION['error'] = "All Fields are Required";
    }
    if (isset($_SESSION['error'])) {
        header('location: ../checkout.php');
        die();
    } else {
        $uid = $_SESSION['uid'];
        $sql = "INSERT into userdetails (name, phonenumber, district, address, uid) VALUES('$name', '$phonenumber', '$district', '$address', '$uid')";
        if (mysqli_query($conn, $sql)) {
            session_start();
            session_unset();
            session_destroy();
            header('location: ../index.php?status=1');
            die();
        }
    }
}
